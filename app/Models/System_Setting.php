<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System_Setting extends Model
{
    use HasFactory;

    protected $table = 'system_setting';

    public static function getSingle()
    {
        return self::find(1);
    }


    public function getLogo()
    {
        if (!empty($this->logo) && file_exists('public/setting/' . $this->logo)) {
            return url('public/setting/' . $this->logo);
        } else {
            return '';
        }
    }
    public function getFevicon()
    {
        if (!empty($this->fevicon) && file_exists('public/setting/' . $this->fevicon)) {
            return url('public/setting/' . $this->fevicon);
        } else {
            return '';
        }
    }
    public function getFooterPayment()
    {
        if (!empty($this->footer_payment_icon) && file_exists('public/setting/' . $this->footer_payment_icon)) {
            return url('public/setting/' . $this->footer_payment_icon);
        } else {
            return '';
        }
    }
}







