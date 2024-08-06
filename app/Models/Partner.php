<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partner';

    public static function getRecord()
    {
        return self::select('partner.*')
            ->where('partner.is_delete', '=', '0')
            ->orderBy("partner.id", "desc")
            ->paginate(20);
    }

    public static function getActiveRecord()
    {
        return self::select('partner.*')
            ->where('partner.is_delete', '=', '0')
            ->where('partner.status', '=', '1')
            ->orderBy("partner.id", "asc")
            ->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public function getImage()
    {
        if (!empty($this->image) && file_exists('public/partner/' . $this->image)) {
            return url('public/partner/' . $this->image);
            } else {
            return '';
            }
    }
}
