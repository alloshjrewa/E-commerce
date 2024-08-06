<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;

use App\Models\Order_Item;
use App\Models\Product_Size;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use App\Models\Discount_Code;
use App\Mail\OrderInvoiceMail;
use App\Models\Shipping_Charge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    public function checkout(Request $request){
        $data['meta_title'] = "Checkout";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $data['getShipping'] = Shipping_Charge::getActiveRecord();
        return view('payment.checkout',$data);


    }
    public function cart(Request $request){
        $data['meta_title'] = "Cart";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";

        return view('payment.cart',$data);
    }

    public function cart_delete($id){

        \Cart::remove($id);

        return redirect()->back();

    }
    public function add_to_cart(Request $request){
        $getProduct = Product::getSingle($request->product_id);
        $total = $getProduct->price;
        if(!empty($request->size_id)){
            $size_id = $request->size_id;
            $getSize = Product_Size::getSingle($size_id);
            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total =  $size_price ;

        }else{
            $size_id = 0;
        }
        $color_id = !empty($request->color_id) ? $request->color_id : 0 ;
        \Cart::add([
            'id' => $getProduct->id,
            'name' => "product",
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => array(
                'size_id' => $size_id,
                'color_id' => $color_id,
            )
        ]);
       return redirect()->back();
    }
    public function update_cart(Request $request){

        foreach($request->cart as $cart){
            \Cart::update($cart['id'],array(
                'quantity' => array(
                    'relative'  => false ,
                    'value'     => $cart['qty'],
                ),
            ));
        }
        return redirect()->back();
    }

    public function applay_discount_code(Request $request)  {

        $getDiscount = Discount_Code::checkDiscountCode($request->discount_code);
        if(!empty($getDiscount)){
            $total = \Cart::getSubTotal();
            if($getDiscount->type == "Amount"){
                $discount_amount = $getDiscount->percent_amount;
                $payment_total  = $total - $discount_amount;
            }else{
                $discount_amount  = ($total * $getDiscount->percent_amount) / 100;
                $payment_total  = $total - $discount_amount ;
            }
            $json['status'] = true;
            $json['payment_total'] = $payment_total ;
            $json['discount_amount'] =number_format( $discount_amount , 2);
            $json['message'] = "success";
        }else {
            $json['status'] = false;
            $json['discount_amount'] = '0.00';
            $json[' payment_total'] = \Cart::getSubTotal();
            $json['message'] = "Discount Code Invalid";
        }
        echo json_encode($json);
    }

    public function place_order(PaymentRequest $request){
    $validate = 0;
    $message ='';
    if(!empty(Auth::check())){
        $user_id =Auth::user()->id;

    }
    else{
        if(!empty($request->is_create)){
            $checkEmail = User::checkEmail($request->email);
            if(!empty($checkEmail)){
                $message = 'This Email Already Registered , Please Choose Another';
                $validate = 1;
            }else{
                $user = new User;
                $user->name = trim($request->first_name);
                $user->email = trim($request->email);
                $user->password = Hash::make($request->password);
                $user->save();

                $user_id = $user->id;
            }

        }else{
          $user_id ='';
        }
    }

    if($validate == 0){

        $getShipping = Shipping_Charge::getSingle($request->shipping);
        $total_amount = \Cart::getSubTotal();
        $discount_amount =0;
        $discount_code ='';
        if(!empty($request->discount_code)){
            $getDiscount = Discount_Code::checkDiscountCode($request->discount_code);
            if(!empty($getDiscount)){
                $discount_code = $request->discount_code;
                if($getDiscount->type == "Amount"){
                    $discount_amount = $getDiscount->percent_amount;
                    $total_amount  = $total_amount - $discount_amount;

                }else{
                    $discount_amount  = ($total_amount * $getDiscount->percent_amount) / 100;
                    $total_amount  = $total_amount - $discount_amount ;
                }
                if($total_amount < 0){
                    $total_amount = 0;
                }
            }

        }

        $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
        $total_amount = $total_amount + $shipping_amount;
        $order = new Order;
        if(!empty($user_id)){
            $order->user_id = trim($user_id);
        }
        if(empty(Auth::check())){
            $order->email = trim($request->email);

        }else{
            $email = Auth::user()->email;
            $order->email = trim($email);
            $user_id =Auth::user()->id;
        }
        $order->user_id = trim($user_id);
        $order->order_number = mt_rand(100000000000,999999999999999);
        $order->first_name = trim($request->first_name);
        $order->last_name = trim($request->last_name);
        $order->company_name = trim($request->company_name);
        $order->country = trim($request->country);
        $order->address_one = trim($request->address_one);
        $order->address_two = trim($request->address_two);
        $order->city = trim($request->city);
        $order->state = trim($request->state);
        $order->postalcode = trim($request->postalcode);
        $order->phone = trim($request->phone);

        $order->note = trim($request->note);
        $order->discount_code = trim($discount_code);
        $order->discount_amount= trim($discount_amount);
        $order->shipping_id = trim($request->shipping);
        $order->shipping_amount = trim($shipping_amount);
        $order->total_amount = trim($total_amount);
        $order->payment_method = trim($request->payment_method);
        $order->save();

            foreach(\Cart::getContent() as $key =>$cart){

        $order_item = new Order_Item();
        $order_item->order_id = $order->id;
        $order_item->product_id = $cart->id;
        $order_item->quantity = $cart->quantity;
        $order_item->price = $cart->price;

        $color_id = $cart->attributes->color_id;
        if(!empty($color_id)){
            $getColor = Color::getSingle($color_id);
            $order_item->color_name = $getColor->name;
        }

        $size_id = $cart->attributes->size_id;
        if(!empty($size_id)){
            $getSize = Product_Size::getSingle($size_id);
            $order_item->size_name = $getSize->name;
            $order_item->size_price = $getSize->price;
        }
        $order_item->total_price = $cart->price * $cart->quantity;
        $order_item->save();
             }
             $json['status'] = true;
             $json['message'] = "Success";
             $json['redirect'] = url('checkout/payment?order_id='.base64_encode($order->id));

    }else{
                $json['status'] = false;
                $json['message'] = $message;
        }
        echo json_encode($json);
    }

    public function checkout_payment(Request $request){

        if(!empty(\Cart::getSubTotal()) && !empty($request->order_id)){
            $order_id = base64_decode($request->order_id);
            $getOrder = Order::getSingle($order_id);
            if(!empty($getOrder)){
                if($getOrder->payment_method == 'cash'){
                    $getOrder->is_payment =1;
                    $getOrder->save();

                    \Cart::clear();

                    return redirect('cart')->with('success' , "Order Placed Successfully");
                }
                else if($getOrder->payment_method == 'paypal'){

                    $paypalUrl = "https://www.sandbox.paypal.com/cgi-bin/webscr";
                    $paypalData = [
                        'business' => "sb-whhsu31289838@business.example.com",//edit it ali jrewa
                        'cmd' => "_xclick",
                        'item_name' => "E-commerce",
                        'no_shipping' => "1",
                        'item_number' => $getOrder->id,
                        'amount' => $getOrder->total_amount,
                        'currency_code' => "USD",
                        'cancel_return' => url('checkout'),
                        'return' => url('paypal/success-payment/'.$getOrder->id),
                    ];

                    header('Location:'.$paypalUrl . '?' . http_build_query($paypalData));
                    exit();
                }
            }else{
                abort(404);
            }
        }
        else{
            abort(404);
        }
    }

    public function paypal_success_payment(Request $request , $id){
            $getOrder = Order::getSingle($id);
            $getOrder->is_payment = 1;
            $getOrder->save();
            Mail::to($getOrder->email)->send(new OrderInvoiceMail($getOrder));
            \Cart::clear();
            return redirect('cart')->with('success', 'Order Successfully Placed');

    }
}
