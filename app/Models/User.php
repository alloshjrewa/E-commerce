<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static function checkEmail($email){
        return User::select("users.*")->where('email', '=', $email)->first();
    }
    public static function getAdmin()
    {
        return User::select("users.*")->where('is_admin', '=', 1)->where('is_delete', '=', 0)->orderBy("id", "desc")->get();
    }
    public static function getCustomer()
    {
        $return =  User::select("users.*");
        if(!empty(Request::get('id'))){
            $return = $return->where('id' , '=' , Request::get('id'));
        }
        if(!empty(Request::get('name'))){
            $return = $return->where('name' , 'like' ,'%'.Request::get('name') .'%');
        }
        if(!empty(Request::get('email'))){
            $return = $return->where('email' , 'like' ,'%'.Request::get('email') .'%');
        }
        if(!empty(Request::get('from_date'))){
            $return = $return->whereDate('created_at' , '>=' ,Request::get('from_date'));
        }
        if(!empty(Request::get('to_date'))){
            $return = $return->whereDate('created_at' , '<=' ,Request::get('to_date'));
        }

        $return = $return->where('is_admin', '=', 0)->where('is_delete', '=', 0)->orderBy("id", "desc")->paginate(30);

        return $return;
    }
    public static function getSingle($id)
    {
        return User::find($id);
    }
    public static function getTotalCustomer(){
        return self::select('id') ->where('is_admin', '=', '0')
        ->where('is_delete', '=', '0')
        ->count();
    }
    public static function getTodayCustomer(){
        return self::select('id') ->where('is_admin', '=', '0')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at' ,'=' , date('Y-m-d'))
        ->count();
    }
    public static function getTotalCustomerMonth($start_Date , $end_Date){
        return self::select('id') ->where('is_admin', '=', '0')
        ->where('is_delete', '=', '0')
        ->whereDate('created_at' ,'>=' , $start_Date)
        ->whereDate('created_at' ,'<=' , $end_Date)
        ->count();
    }


}
