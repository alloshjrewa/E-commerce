<?php

namespace App\Models;

use Stripe\Charge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    static public function getSingle($id){
        return self::find($id);
    }
    public static function getRecord()
    {
        $return = Order::select('orders.*');
            if(!empty(Request::get('id'))){
                $return = $return->where('id' , '=' , Request::get('id'));
            }
            if(!empty(Request::get('company_name'))){
                $return = $return->where('company_name' , 'like' ,'%'.Request::get('company_name') .'%');
            }
            if(!empty(Request::get('first_name'))){
                $return = $return->where('first_name' , 'like' ,'%'.Request::get('first_name') .'%');
            }
            if(!empty(Request::get('last_name'))){
                $return = $return->where('last_name' , 'like' ,'%'.Request::get('last_name') .'%');
            }
            if(!empty(Request::get('email'))){
                $return = $return->where('email' , 'like' ,'%'.Request::get('email') .'%');
            }
            if(!empty(Request::get('phone'))){
                $return = $return->where('phone' , 'like' ,'%'.Request::get('phone') .'%');
            }
            if(!empty(Request::get('postalcode'))){
                $return = $return->where('postalcode' , 'like' ,'%'.Request::get('postalcode') .'%');
            }
            if(!empty(Request::get('country'))){
                $return = $return->where('country' , 'like' ,'%'.Request::get('country') .'%');
            }
            if(!empty(Request::get('state'))){
                $return = $return->where('state' , 'like' ,'%'.Request::get('state') .'%');
            }
            if(!empty(Request::get('city'))){
                $return = $return->where('city' , 'like' ,'%'.Request::get('city') .'%');
            }
            if(!empty(Request::get('from_date'))){
                $return = $return->whereDate('created_at' , '>=' ,Request::get('from_date'));
            }
            if(!empty(Request::get('to_date'))){
                $return = $return->whereDate('created_at' , '<=' ,Request::get('to_date'));
            }

            $return = $return->where('orders.is_delete', '=', '0')
            ->where('orders.is_payment', '=', '1')
            ->orderBy("orders.id", "desc")->paginate(30);
            return $return;
    }
    public function getShipping()
    {
        return $this->belongsTo(Shipping_Charge::class, 'shipping_id');
    }
    public function getItem()
    {
        return $this->hasMany(Order_Item::class, 'order_id');
    }

    public static function getTotalOrder(){
        return self::select('id') ->where('is_payment', '=', '1')
        ->where('orders.is_delete', '=', '0')
        ->count();
    }
    public static function getTodayOrder(){
        return self::select('id') ->where('is_payment', '=', '1')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at', '=', date('Y-m-d'))
        ->count();
    }
    public static function getTotalPayment(){
        return self::select('id') ->where('is_payment', '=', '1')
        ->where('orders.is_delete', '=', '0')
        ->sum('total_amount');
    }
    public static function getTodayPayment(){
        return self::select('id') ->where('is_payment', '=', '1')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at', '=', date('Y-m-d'))
        ->sum('total_amount');
    }
    public static function getLatestOrder(){
        return Order::select('orders.*')
        ->where('orders.is_delete', '=', '0')
        ->where('orders.is_payment', '=', '1')
        ->orderBy("id", "desc")
        ->limit(10)
        ->get();
    }
    public static function getTotalOrderMonth($start_Date , $end_Date){
        return self::select('id') ->where('is_payment', '=', '1')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at' ,'>=' , $start_Date)
        ->whereDate('created_at' ,'<=' , $end_Date)
        ->count();
    }
    public static function getTotalPaymentMonth($start_Date , $end_Date){
        return self::select('id') ->where('is_payment', '=', '1')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at' ,'>=' , $start_Date)
        ->whereDate('created_at' ,'<=' , $end_Date)
        ->sum('total_amount');
    }

    //StartUser Part

    public static function getUserTotalOrder($user_id){
        return self::select('id')
        ->where('user_id', '=', $user_id)
        ->where('is_payment', '=', '1')
        ->where('orders.is_delete', '=', '0')
        ->count();
    }
    public static function getUserTodayOrder($user_id){
        return self::select('id')
        ->where('user_id', '=', $user_id)
        ->where('is_payment', '=', '1')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at', '=', date('Y-m-d'))
        ->count();
    }
    public static function getUserTotalPayment($user_id){
        return self::select('id')
        ->where('user_id', '=', $user_id)
        ->where('is_payment', '=', '1')
        ->where('orders.is_delete', '=', '0')
        ->sum('total_amount');
    }
    public static function getUserTodayPayment($user_id){
        return self::select('id')
        ->where('user_id', '=', $user_id)
        ->where('is_payment', '=', '1')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at', '=', date('Y-m-d'))
        ->sum('total_amount');
    }
    //End User Part


    public static function getUserTotalStatus($user_id,$status){
        return self::select('id')
        ->where('status', '=', $status)
        ->where('user_id', '=', $user_id)
        ->where('is_payment', '=', '1')
        ->where('orders.is_delete', '=', '0')
        ->count();
    }
    public static function getUserRecord($user_id)
    {
        return Order::select('orders.*')
            ->where('user_id', '=', $user_id)
            ->where('orders.is_delete', '=', '0')
            ->where('orders.is_payment', '=', '1')
            ->orderBy("orders.id", "desc")->paginate(20);
    }
    public static function getSingleUser($user_id,$id)
    {
        return self::select('orders.*')
            ->where('id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->where('orders.is_delete', '=', '0')
            ->where('orders.is_payment', '=', '1')
            ->first();
    }


}
