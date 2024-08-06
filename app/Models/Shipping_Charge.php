<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_Charge extends Model
{
    use HasFactory;

    protected $table = 'shipping_charges';

    public static function getRecord()
    {
        return self::select('shipping_charges.*')
            ->where('shipping_charges.is_delete', '=', '0')
            ->orderBy("shipping_charges.id", "desc")
            ->paginate(20);
    }
    public static function getActiveRecord()
    {
        return self::select('shipping_charges.*')
            ->where('shipping_charges.is_delete', '=', '0')
            ->where('shipping_charges.status', '=', '1')
            ->orderBy("shipping_charges.id", "asc")
            ->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }

}
