<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Size extends Model
{
    use HasFactory;

    protected $table = 'product_size';

    public static function DeleteRecord($product_id)
    {
        Self::where('product_id', '=', $product_id)->delete();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
}
