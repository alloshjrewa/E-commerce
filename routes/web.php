<?php

use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\ProductController as ProductFront;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    ['middleware' => 'user'],
    function () {
        Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('user/orders', [UserController::class, 'orders'])->name('user.orders');
        Route::get('user/order/detail/{id}', [UserController::class, 'order_detail'])->name('user.detail');
        Route::get('user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit-profile');
        Route::post('user/edit-profile', [UserController::class, 'update_profile'])->name('user.update_profile');
        Route::get('user/change-password', [UserController::class, 'change_password'])->name('user.change-password');
        Route::post('user/change-password', [UserController::class, 'update_password'])->name('user.update_password');

        //wishlist
        Route::post('add_to_wishlist', [UserController::class, 'add_to_wishlist']);
        Route::get('my-wishlist', [ProductFront::class, 'my_wishlist']);

        //review
        Route::post('user/make-review', [UserController::class, 'submit_review']);



    });
Route::group(
    ['middleware' => 'admin', 'prefix' => 'admin'],
    function () {

        // Dashboard Routes

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        //Admin Routes

        Route::get('/admin/list', [AdminController::class, 'index']);
        Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

        //Customer Routes
        Route::get('customer/list', [AdminController::class, 'customer_list']);


         //Order Routes

        Route::get('/order/list', [OrderController::class, 'index']);
        Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
        Route::get('/order_status', [OrderController::class, 'order_status']);

        //Category Routes

        Route::get('/category/list', [CategoryController::class, 'index']);
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

        //Sub Category Routes

        Route::get('/sub_category/list', [SubCategoryController::class, 'index']);
        Route::get('/sub_category/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
        Route::post('/sub_category/create', [SubCategoryController::class, 'store'])->name('sub_category.store');
        Route::get('/sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
        Route::post('/sub_category/update/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
        Route::get('/sub_category/delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub_category.delete');

        //get sub category ajax

        Route::post('/get_sub_category', [SubCategoryController::class, 'get_sub_category']);

        //Product Routes

        Route::get('/product/list', [ProductController::class, 'index']);
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');

        // Brand Routes

        Route::get('/brand/list', [BrandController::class, 'index']);
        Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/brand/create', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');

        //Color Routes

        Route::get('/color/list', [ColorController::class, 'index']);
        Route::get('/color/create', [ColorController::class, 'create'])->name('color.create');
        Route::post('/color/create', [ColorController::class, 'store'])->name('color.store');
        Route::get('/color/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
        Route::post('/color/update/{id}', [ColorController::class, 'update'])->name('color.update');
        Route::get('/color/delete/{id}', [ColorController::class, 'destroy'])->name('color.delete');

        //Delete Image

        Route::get('/product/image_delete/{id}', [ProductController::class, 'image_delete']);

        //sortable image

        Route::post('/product_image_sortable', [ProductController::class, 'product_image_sortable']);

        //Discount Code

        Route::get('/discount_code/list', [DiscountCodeController::class, 'index']);
        Route::get('/discount_code/create', [DiscountCodeController::class, 'create'])->name('discount_code.create');
        Route::post('/discount_code/create', [DiscountCodeController::class, 'store'])->name('discount_code.store');
        Route::get('/discount_code/edit/{id}', [DiscountCodeController::class, 'edit'])->name('discount_code.edit');
        Route::post('/discount_code/update/{id}', [DiscountCodeController::class, 'update'])->name('discount_code.update');
        Route::get('/discount_code/delete/{id}', [DiscountCodeController::class, 'destroy'])->name('discount_code.delete');

         //Shipping Charge

        Route::get('/shipping_charge/list', [ShippingChargeController::class, 'index']);
        Route::get('/shipping_charge/create', [ShippingChargeController::class, 'create'])->name('shipping_charge.create');
        Route::post('/shipping_charge/create', [ShippingChargeController::class, 'store'])->name('shipping_charge.store');
        Route::get('/shipping_charge/edit/{id}', [ShippingChargeController::class, 'edit'])->name('shipping_charge.edit');
        Route::post('/shipping_charge/update/{id}', [ShippingChargeController::class, 'update'])->name('shipping_charge.update');
        Route::get('/shipping_charge/delete/{id}', [ShippingChargeController::class, 'destroy'])->name('shipping_charge.delete');

        //Slider
        Route::get('/slider/list', [SliderController::class, 'index']);
        Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/slider/create', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
        Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');

        // Partner
        Route::get('/partner/list', [PartnerController::class, 'index']);
        Route::get('/partner/create', [PartnerController::class, 'create'])->name('partner.create');
        Route::post('/partner/create', [PartnerController::class, 'store'])->name('partner.store');
        Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('partner.edit');
        Route::post('/partner/update/{id}', [PartnerController::class, 'update'])->name('partner.update');
        Route::get('/partner/delete/{id}', [PartnerController::class, 'destroy'])->name('partner.delete');


        //Page
        Route::get('/page/list', [PageController::class, 'index']);
        Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
        Route::post('/page/create', [PageController::class, 'store'])->name('page.store');
        Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
        Route::post('/page/update/{id}', [PageController::class, 'update'])->name('page.update');

         //Contact Us
        Route::get('/contact-us', [PageController::class, 'contact_us']);
        Route::get('/contact-us/delete/{id}', [PageController::class, 'contact_us_delete']);


        //system setting
        Route::get('/system-setting', [PageController::class, 'system_setting']);
        Route::post('/system-setting', [PageController::class, 'update_system_setting'])->name('update_system_setting');

    }
);

Route::get('admin/login', [AuthController::class, 'login_admin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'auth_login_admin'])->name('admin.auth');
Route::get('admin/logout', [AuthController::class, 'logout_admin'])->name('admin.logout');

// *****************************************************





//front side home controller
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('contact', 'contact');
    Route::post('contact', 'submit_contact');
    Route::get('about',  'about');
    Route::get('faq', 'faq');
    Route::get('payment-methods', 'payment_method');
    Route::get('money-back-guarantee', 'money_back_guarantee');
    Route::get('returns', 'return');
    Route::get('shippings', 'shipping');
    Route::get('terms-conditions', 'terms_conditions');
    Route::get('privacy-policy', 'privacy_policy');
});


Route::post('auth_register', [AuthController::class, 'auth_register']);
Route::post('auth_login', [AuthController::class, 'auth_login']);

Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::post('forgot-password', [AuthController::class, 'auth_forgot_password']);


Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'auth_reset']);

Route::get('activate/{id}', [AuthController::class, 'activate_email']);

Route::get('cart', [PaymentController::class, 'cart']);

Route::get('cart/delete/{id}', [PaymentController::class, 'cart_delete']);
Route::post('product/add-to-cart', [PaymentController::class, 'add_to_cart']);
Route::post('update_cart', [PaymentController::class, 'update_cart']);
Route::get('checkout', [PaymentController::class, 'checkout']);
Route::post('checkout/applay_discount_code', [PaymentController::class, 'applay_discount_code']);
Route::post('checkout/place_order', [PaymentController::class, 'place_order']);
Route::get('checkout/payment', [PaymentController::class, 'checkout_payment']);

Route::get('paypal/success-payment/{id}', [PaymentController::class, 'paypal_success_payment']);

//Product Front
Route::get('search', [ProductFront::class, 'getProductSearch']);
Route::post('get_filter_product_ajax', [ProductFront::class, 'getFilterProductAjax']);
Route::get('{category?}/{subcategory?}', [ProductFront::class, 'getCategory']);

