<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Color extends Model
{
    use HasFactory;

    protected $table = 'product_color';

    public static function DeleteRecord($product_id)
    {
        Self::where('product_id', '=', $product_id)->delete();
    }
    public function getColor(){
        return $this->belongsTo(Color::class , 'color_id');
    }
}
