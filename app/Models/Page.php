<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'page';

    protected $filable = [
        'name',
        'title',
        'slug',
        'keywords',
        'description',
        'image',
    ];

    public static function getSingle($id)
    {
        return self::find($id);
    }
    public static function getSlug($slug)
    {
        return self::where('slug' , '=' , $slug)->first();
    }

    public static function getRecord()
    {
        return self::select('page.*')->get();
    }
    public function getImage()
    {
        if (!empty($this->image) && file_exists('public/page/' . $this->image)) {
            return url('public/page/' . $this->image);
        } else {
            return '';
        }
    }
}




