<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = [
        'name',
        'status',
        'code'
    ];

    public static function getRecord()
    {
        return self::select('colors.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'colors.created_by')
            ->where('colors.is_delete', '=', '0')->orderBy("colors.id", "desc")->get();
    }
    public static function getAciveRecord()
    {
        return self::select('colors.*')
            ->join('users', 'users.id', '=', 'colors.created_by')
            ->where('colors.is_delete', '=', '0')
            ->where('colors.status', '=', '1')
            ->orderBy("colors.name", "asc")
            ->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
}
