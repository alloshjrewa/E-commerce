<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Sub_Category;
use App\Models\Color;
use App\Models\Product_Color;
use App\Models\Product_Size;
use App\Models\Product_Image;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Product";

        $data['getRecord'] = Product::getRecord();

        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Product";
        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = trim($request->title);
        $slug = Str::slug($title, "-");
        $product = new Product;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();

        $checkSlug = Product::checkSlug($slug);
        if (empty($checkSlug)) {
            $product->slug = $slug;
            $product->save();
        } else {
            $new_slug = $slug . '-' . $product->id;
            $product->slug = $new_slug;
            $product->save();
        }
        return redirect('admin/product/edit/' . $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::getSingle($id);
        if (!empty($product)) {
            $data['getCategory'] = Category::getAciveRecord();
            $data['getBrand'] = Brand::getAciveRecord();
            $data['getColor'] = Color::getAciveRecord();
            $data['product'] = $product;
            $data['getSubCategory'] = Sub_Category::getRecordSubCategory($product->category_id);
            $data['header_title'] = "Edit Product";
            return view('admin.product.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::getSingle($id);
        if (!empty($product)) {

            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            $product->price = trim($request->price);
            $product->old_price = trim($request->old_price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additional_information = trim($request->additional_information);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = trim($request->status);
            $product->save();

            Product_Color::DeleteRecord($product->id);
            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color_id) {
                    $color = new Product_Color();
                    $color->color_id = $color_id;
                    $color->product_id = $product->id;
                    $color->save();
                }
            }
            Product_Size::DeleteRecord($product->id);
            if (!empty($request->size)) {
                foreach ($request->size as $size) {
                    if (!empty($size['name'])) {
                        $savesize = new Product_Size();
                        $savesize->product_id = $product->id;
                        $savesize->name = $size['name'];
                        $savesize->price = !empty($size['price']) ? $size['price'] : 0;

                        $savesize->save();
                    }
                }
            }
            //image
            if (!empty($request->file('image'))) {
                foreach ($request->file('image') as $value) {
                    if ($value->isValid()) {
                        $extension = $value->getClientOriginalExtension();
                        $getfilename = $value->getClientOriginalName();
                        $name = pathinfo($getfilename, PATHINFO_FILENAME);
                        $random = date('Ymdhis') . '_' . $name . Str::random(2);
                        $filename  = strtolower($random) . '.' . $extension;
                        $value->move('public/products_images/', $filename);

                        $imageupload = new  Product_Image;
                        $imageupload->image_name = $filename;
                        $imageupload->image_extension  = $extension;
                        $imageupload->product_id = $product->id;
                        $imageupload->save();
                    }
                }
            }



            return redirect()->back()->with('success', "Product Updated Successfully");
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function image_delete($id)
    {
        $image = Product_Image::getSingle($id);
        if (!empty($image->getUploadedImage())) {
            unlink('public/products_images/' . $image->image_name);
        }
        $image->delete();
        return redirect()->back()->with('success', "Image Deleted Successfully");
    }
    public function product_image_sortable(Request $request)
    {
        if (!empty($request->photo_id)) {
            $i = 1;
            foreach ($request->photo_id as $photo_id) {
                $image = Product_Image::getSingle($photo_id);
                $image->order_by = $i;
                $image->save();
                $i++;
            }
        }
        $json['success'] = true;
        echo json_encode($json);
    }
}
