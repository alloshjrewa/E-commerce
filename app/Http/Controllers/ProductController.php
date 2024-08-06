<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Sub_Category;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
     //wishlist
    public function my_wishlist()
    {
        $data['meta_title'] = "My Wishlist";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";

        $data['getProducts'] = Product::getMyWisllist(Auth::user()->id);

        return view('product.my_wishlist', $data);
    }

    public function getProductSearch(Request $request){
            $data['meta_title'] = "Search";
            $data['meta_description'] = "";
            $data['meta_keywords'] = "";

            $getProducts = Product::getProducts();
            $page = 0;
            if(!empty($getProducts->nextPageUrl())){
                $parse_url = parse_url($getProducts->nextPageUrl());
                if(!empty($parse_url["query"])){
                    parse_str($parse_url['query'],$get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProducts'] = $getProducts;
            $data['getColor'] = Color::getAciveRecord();
            $data['getBrand'] = Brand::getAciveRecord();

            return view('product.index',$data);
    }
    public function getCategory($slug, $subslug = '')
    {
        $getProductSingle = Product::getSingleSlug($slug);
        $getCategory =  Category::getSingleSlug($slug);
        $getSubCategory = Sub_Category::getSingleSlug($subslug);

        $data['getColor'] = Color::getAciveRecord();
        $data['getBrand'] = Brand::getAciveRecord();

        if(!empty($getProductSingle)){

            $data['meta_title']         = $getProductSingle->title;
            $data['meta_description']   = $getProductSingle->description;

            $data['getProduct']         = $getProductSingle;

            $data['getRelatedProduct']  = Product::getRelatedProduct($getProductSingle->id , $getProductSingle->sub_category_id);

            $data['getReviewProduct']  = Review::getReviewProduct($getProductSingle->id);


            return view('product.detail', $data);
        }
        else if (!empty($getCategory) && !empty($getSubCategory)) {

            $data['meta_title'] = $getSubCategory->title;
            $data['meta_description'] = $getSubCategory->description;
            $data['meta_keywords'] = $getSubCategory->keywords;

            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;

            $getProducts = Product::getProducts($getCategory->id, $getSubCategory->id);
            $page = 0;
            if(!empty($getProducts->nextPageUrl())){
                $parse_url = parse_url($getProducts->nextPageUrl());
                if(!empty($parse_url["query"])){
                    parse_str($parse_url['query'],$get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProducts'] = $getProducts;

            $data['getSubCategoryFilter'] = Sub_Category::getRecordSubCategory($getCategory->id);

            return view('product.index', $data);
        } else if (!empty($getCategory)) {

            $data['getSubCategoryFilter'] = Sub_Category::getRecordSubCategory($getCategory->id);

            $data['meta_title'] = $getCategory->title;
            $data['meta_description'] = $getCategory->description;
            $data['meta_keywords'] = $getCategory->keywords;

            $data['getCategory'] = $getCategory;

            $getProducts = Product::getProducts($getCategory->id);

            $page = 0;
            if(!empty($getProducts->nextPageUrl())){
                $parse_url = parse_url($getProducts->nextPageUrl());
                if(!empty($parse_url["query"])){
                    parse_str($parse_url['query'],$get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data["getProducts"] = $getProducts;

            return view('product.index', $data);
        } else {
            abort(404);
        }
    }
    public function getFilterProductAjax(Request $request){
        $getProduct = Product::getProducts();
        $page = 0;
        if(!empty($getProduct->nextPageUrl())){
            $parse_url = parse_url($getProduct->nextPageUrl());
            if(!empty($parse_url["query"])){
                parse_str($parse_url['query'],$get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }
        return response()->json([
            "status" => true,
            "page"  => $page,
            "success" => view("product._index" ,["getProducts" => $getProduct,

        ])->render(),
    ],200);
    }


}
