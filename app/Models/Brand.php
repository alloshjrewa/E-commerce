<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'title',
        'description',
        'keywords'
    ];

    public static function getRecord()
    {
        return self::select('brands.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'brands.created_by')
            ->where('brands.is_delete', '=', '0')->orderBy("brands.id", "desc")->get();
    }
    public static function getAciveRecord()
    {
        return self::select('brands.*')
            ->join('users', 'users.id', '=', 'brands.created_by')
            ->where('brands.is_delete', '=', '0')
            ->where('brands.status', '=', '1')
            ->orderBy("brands.name", "asc")
            ->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
}
