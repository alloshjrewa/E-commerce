<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    public static function DeleteRecord($product_id)
    {
        Self::where('product_id', '=', $product_id)->delete();
    }
    public function getUploadedImage()
    {
        if (!empty($this->image_name) && file_exists('public/products_images/' . $this->image_name)) {
            return url('public/products_images/' . $this->image_name);
        } else {
            return '';
        }
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
}
