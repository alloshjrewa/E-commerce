<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sub_Category extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'status',
        'title',
        'description',
        'keywords'
    ];

    public static function getRecord()
    {
        return self::select('sub_categories.*', 'users.name as created_by_name', 'categories.name as category_name')
            ->join('users', 'users.id', '=', 'sub_categories.created_by')
            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->where('sub_categories.is_delete', '=', 0)
            ->orderBy("sub_categories.id", "desc")->paginate(20);
    }
    public static function getRecordSubCategory($category_id)
    {
        return self::select('sub_categories.*')
            ->join('users', 'users.id', '=', 'sub_categories.created_by')
            ->where('sub_categories.is_delete', '=', 0)
            ->where('sub_categories.status', '=', 1)
            ->where('sub_categories.category_id', '=', $category_id)
            ->orderBy("sub_categories.name", "asc")->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public static function getSingleSlug($slug)
    {
        return self::where("slug", "=", $slug)
            ->where('sub_categories.is_delete', '=', '0')
            ->where('sub_categories.status', '=', '1')
            ->first();
    }

    public function TotalProduct(){
        return $this->hasMany(Product::class , 'sub_category_id')
        ->where('products.is_delete', '=', '0')
        ->where('products.status', '=', '1')
        ->count();
    }
    //Relations


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
