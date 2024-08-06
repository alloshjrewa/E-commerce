<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "review";

    protected $fillable = [
        'rating',
        'review',
        'order_id',
        'product_id',
        'user_id',
    ];

    public static function getSingle($id)
    {
        return self::find($id);
    }
    static public function getReview($product_id,$order_id ,$user_id){
        return self::select('*')
        ->where('product_id' , '=' ,$product_id)
        ->where('order_id' , '=' ,$order_id)
        ->where('user_id' , '=' ,$user_id)
        ->first();
    }
    static public function getReviewProduct($product_id){

            return self::select('review.*','users.name')
            ->join('users' , 'users.id' , 'review.user_id')
            ->where('review.product_id' , '=' ,$product_id)
            ->orderBy('review.id' , 'desc')
            ->paginate(20);
    }
    static public function getRatingAVG($product_id){

        return self::select('review.rating')
        ->join('users' , 'users.id' , 'review.user_id')
        ->where('review.product_id' , '=' ,$product_id)
        ->avg('review.rating');
}

    public function getStarPercent(){
        $rating = $this->rating;
        if($rating == 1){
            return 20;
        }
        else if($rating == 2){
            return 40;
        }
        else if($rating == 3){
            return 60;
        }
        else if($rating == 4){
            return 80;
        }
        else if($rating == 5){
            return 100;
        }
        else{
            return 0;
        }
    }
}
