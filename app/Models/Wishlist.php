<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    public static function DeleteRecord($product_id , $user_id)
    {
        Self::where('product_id', '=', $product_id)->where('user_id' , '=' , $user_id)->delete();
    }
    public static function getSingle($id )
    {
        return self::find($id);
    }
    public static function checkExsist($product_id , $user_id)
    {
        return Self::where('product_id', '=', $product_id)->where('user_id' , '=' , $user_id)->count();
    }
}
