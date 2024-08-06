<?php

namespace App\Models;



use App\Models\Wishlist;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'sku',
        'category_id',
        'sub_category_id',
        'brand_id',
        'old_price',
        'price',
        'short_description',
        'description',
        'additional_information',
        'shipping_returns',
        'status',
    ];
    public static function getMyWisllist($user_id)
    {
        $return = self::select(
            'products.*',
            'users.name as created_by_name',
            'sub_categories.name as sub_category_name',
            'sub_categories.slug as sub_category_slug',
            'categories.name as category_name',
            'categories.slug as category_slug')

            ->join('users', 'users.id', '=', 'products.created_by')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
            ->join('wishlist', 'wishlist.product_id', '=', 'products.id')

            ->where('wishlist.user_id', '=', $user_id)
            ->where('products.is_delete', '=', 0)
            ->where('products.status', '=', 1)
            ->groupBy('products.id')
            ->orderBy('products.id', 'desc')
            ->paginate('30');
        return $return;
    }
    public static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }
    public static function getRecord()
    {
        return self::select('products.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'products.created_by')
            ->where('products.is_delete', '=', '0')
            ->orderBy("products.id", "desc")->paginate(50);
    }

    static public function getProducts($category_id = "", $subcategory_id = "")
    {
        $return = self::select(
            'products.*',
            'users.name as created_by_name',
            'sub_categories.name as sub_category_name',
            'sub_categories.slug as sub_category_slug',
            'categories.name as category_name',
            'categories.slug as category_slug'
        )
            ->join('users', 'users.id', '=', 'products.created_by')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id');

        if (!empty($category_id)) {
            $return = $return->where('products.category_id', '=', $category_id);
        }

        if (!empty($subcategory_id)) {
            $return = $return->where('products.sub_category_id', '=', $subcategory_id);
        }
        if(!empty(Request::get('sub_category_id'))){
            $sub_category_id = rtrim(Request::get('sub_category_id') , ',');
            $sub_category_id_array = explode("," , $sub_category_id);
            $return = $return->whereIn('products.sub_category_id', $sub_category_id_array);
        }else{
            if(!empty(Request::get('old_category_id'))) {
                $return = $return->where('products.category_id', '=', Request::get('old_category_id'));
            }

            if(!empty(Request::get('old_sub_category_id'))) {
                $return = $return->where('products.sub_category_id', '=', Request::get('old_sub_category_id'));
            }
        }
        if(!empty(Request::get('color_id'))){
            $color_id = rtrim(Request::get('color_id') , ',');
            $color_id_array = explode("," , $color_id);
            $return = $return->join('product_color','product_color.product_id', '=', 'products.id');
            $return = $return->whereIn('product_color.color_id', $color_id_array);
        }
        if(!empty(Request::get('brand_id'))){
            $brand_id = rtrim(Request::get('brand_id') , ',');
            $brand_id_array = explode("," , $brand_id);
            $return = $return->whereIn('products.brand_id', $brand_id_array);
        }
        if(!empty(Request::get('start_price')) && !empty(Request::get('end_price'))){
            $start_price = str_replace('$' , '' , Request::get('start_price'));
            $end_price = str_replace('$' , '' , Request::get('end_price'));
            $return = $return->where('products.price', '>=', $start_price);
            $return = $return->where('products.price', '<=', $end_price);
        }

        if(!empty(Request::get('q'))){
            $return = $return->where('products.title', 'like', "%".(Request::get('q'))."%");
        }
        $return = $return->where('products.is_delete', '=', 0)
            ->where('products.status', '=', 1)
            ->groupBy('products.id')
            ->orderBy('products.id', 'desc')
            ->paginate('30');
        return $return;
    }
    static public function getRelatedProduct($product_id , $sub_category_id){
        $return = self::select(
            'products.*',
            'users.name as created_by_name',
            'sub_categories.name as sub_category_name',
            'sub_categories.slug as sub_category_slug',
            'categories.name as category_name',
            'categories.slug as category_slug'
        )
            ->join('users', 'users.id', '=', 'products.created_by')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
            ->where('products.id', '!=', $product_id)
            ->where('products.sub_category_id', '=', $sub_category_id)
            ->where('products.is_delete', '=', 0)
            ->where('products.status', '=', 1)
            ->groupBy('products.id')
            ->orderBy('products.id', 'desc')
            ->limit(10)
            ->get();
            return $return;
    }
    public static function getSingle($id)
    {
        return self::find($id);
    }
    public function getColor()
    {
        return $this->hasMany(Product_Color::class, 'product_id');
    }

    public function getSize()
    {
        return $this->hasMany(Product_Size::class, 'product_id');
    }
    static public function checkWishlist($product_id)
    {
        return Wishlist::checkExsist($product_id , Auth::user()->id);
    }

    public function getImage()
    {
        return $this->hasMany(Product_Image::class, 'product_id')->orderBy('order_by', 'asc');
    }

    static public function getSingleImage($product_id)
    {
        return Product_Image::where('product_id', '=', $product_id)->orderBy('order_by', 'asc')->first();
    }
    static public function getSingleSlug($slug){
        return self::where('slug', '=', $slug)
        ->where('products.is_delete', '=', 0)
        ->where('products.status', '=', 1)
        ->first();
    }
    public function getCategory(){
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function getSubCategory(){
        return $this->belongsTo(Sub_Category::class , 'sub_category_id');
    }
    //reviwe

    public function getTotalReview()
    {
        return $this->hasMany(Review::class, 'product_id') ->join('users' , 'users.id' , 'review.user_id')->count();
    }
    public function getReviewRating($product_id){
        $average = Review::getRatingAVG($product_id);
            if($average >= 1 && $average <2){
                return 20;
            }else if ($average >= 2 && $average <3){
                return 40;
            }
            else if ($average >= 3 && $average <4){
                return 60;
            }
            else if ($average >= 4 && $average <5){
                return 80;
            }
            else if ($average >= 5 && $average <6){
                return 100;
            }else{
                return 0;
            }

    }
}
