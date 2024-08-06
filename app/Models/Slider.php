<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'slider';

    public static function getRecord()
    {
        return self::select('slider.*')
            ->where('slider.is_delete', '=', '0')
            ->orderBy("slider.id", "desc")
            ->paginate(20);
    }

    public static function getActiveRecord()
    {
        return self::select('slider.*')
            ->where('slider.is_delete', '=', '0')
            ->where('slider.status', '=', '1')
            ->orderBy("slider.id", "asc")
            ->get();
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public function getImage()
    {
        if (!empty($this->image) && file_exists('public/slider/' . $this->image)) {
            return url('public/slider/' . $this->image);
            } else {
            return '';
            }
    }
}
