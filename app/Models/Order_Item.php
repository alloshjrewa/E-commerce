<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Item extends Model
{
    use HasFactory;

    protected $table = 'orders_item';
    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    static public function getReview($product_id , $order_id){
        return Review::getReview($product_id,$order_id , Auth::user()->id);
    }
}
