<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount_Code extends Model
{
    use HasFactory;

    protected $table = 'discount_codes';

    protected $fillable = [
        'name',
        'type',
        'percent_amount',
        'expire_date',
        'status',
    ];
    public static function getRecord()
    {
        return self::select('discount_codes.*')
            ->where('discount_codes.is_delete', '=', '0')
            ->orderBy("discount_codes.id", "desc")
            ->paginate(20);
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public static function checkDiscountCode($discount_code)
    {
        return self::select('discount_codes.*')
        ->where('discount_codes.is_delete', '=', '0')
        ->where('discount_codes.status', '=', '1')
        ->where('discount_codes.name', '=', $discount_code)
        ->where('discount_codes.expire_date', '>=', date('Y-m-d'))
        ->first();
    }

}
