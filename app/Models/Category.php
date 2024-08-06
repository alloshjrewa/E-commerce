<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

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
        return self::select('categories.*', 'users.name as created_by_name')->join('users', 'users.id', '=', 'categories.created_by')
            ->where('categories.is_delete', '=', '0')
            ->orderBy("categories.id", "desc")->get();
    }
    public static function getAciveRecord()
    {
        return self::select('categories.*')
            ->join('users', 'users.id', '=', 'categories.created_by')
            ->where('categories.is_delete', '=', '0')
            ->where('categories.status', '=', '1')
            ->orderBy("categories.name", "asc")
            ->get();
    }
    public static function getMenuRecord()
    {
        return self::select('categories.*')
            ->join('users', 'users.id', '=', 'categories.created_by')
            ->where('categories.is_delete', '=', '0')
            ->where('categories.status', '=', '1')
            ->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public static function getSingleSlug($slug)
    {
        return self::where("slug", "=", $slug)
            ->where('categories.is_delete', '=', '0')
            ->where('categories.status', '=', '1')
            ->first();
    }

    //Relations

    public function getSubCategory()
    {
        return $this->hasMany(Sub_Category::class, 'category_id')->where('sub_categories.is_delete', '=', '0')
            ->where('sub_categories.status', '=', '1');
    }
}
