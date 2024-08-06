<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $data['meta_title'] = "Dashboard";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";

        $data['TotalOrder'] = Order::getUserTotalOrder(Auth::user()->id) ;
        $data['TodayOrder'] = Order::getUserTodayOrder(Auth::user()->id) ;
        $data['TotalPayment'] = Order::getUserTotalPayment(Auth::user()->id) ;
        $data['TodayPayment'] = Order::getUserTodayPayment(Auth::user()->id) ;

        $data['TotalPending'] = Order::getUserTotalStatus(Auth::user()->id,0) ;
        $data['TotalInProgress'] = Order::getUserTotalStatus(Auth::user()->id,1) ;
        $data['TotalCompleted'] = Order::getUserTotalStatus(Auth::user()->id,3) ;
        $data['TotalCancelled'] = Order::getUserTotalStatus(Auth::user()->id,4) ;

        return view('user.dashboard', $data);
    }
    public function orders()
    {

        $data['getRecord'] = Order::getUserRecord(Auth::user()->id);
        $data['meta_title'] = "Orders";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        return view('user.orders', $data);
    }
    public function order_detail($id){

        $data['getRecord'] = Order::getSingleUser(Auth::user()->id,$id);
        if(!empty($data['getRecord'])){
            $data['meta_title'] = "Order Detail";
            $data['meta_description'] = "";
            $data['meta_keywords'] = "";
            return view('user.order_detail', $data);
        }else{
            abort(404);
        }

}
    public function edit_profile()
    {
        $data['meta_title'] = "Edit Profile";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        $data['getRecord'] =  User::getSingle(Auth::user()->id);
        return view('user.edit_profile', $data);
    }
    public function update_profile(Request $request){

        $user = User::getSingle(Auth::user()->id);
        $user->name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->company_name = trim($request->company_name);
        $user->country = trim($request->country);
        $user->address_one = trim($request->address_one);
        $user->address_two = trim($request->address_two);
        $user->city = trim($request->city);
        $user->state = trim($request->state);
        $user->postalcode = trim($request->postalcode);
        $user->phone = trim($request->phone);
        $user->save();

        return redirect()->back()->with('success' , "Profile Updated Successfully");
    }
    public function change_password()
    {
        $data['meta_title'] = "Change Password";
        $data['meta_description'] = "";
        $data['meta_keywords'] = "";
        return view('user.change_password', $data);
    }
    public function update_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password , $user->password)){
            if($request->password == $request->cpassword){
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success' , "Password Updated Successfully");
            }else{
                return redirect()->back()->with('error' , "New Password And Confirm Password Does Not Match");
            }
        }
        else{
            return redirect()->back()->with('error' , "Old Password Is Not Correct");
        }
    }

    //wishlist
    public function add_to_wishlist(Request $request){

        $check = Wishlist::checkExsist($request->product_id , Auth::user()->id);
        if(empty($check)){

        $save = new Wishlist;
        $save->user_id = Auth::user()->id;
        $save->product_id = $request->product_id;
        $save->save();

        $json['is_wishlist'] = 1;

        }else{
            Wishlist::DeleteRecord($request->product_id , Auth::user()->id);
            $json['is_wishlist'] = 0;
        }
        $json['status'] = true;
        echo json_encode($json);
    }

    //review
    public function submit_review(Request $request){
        $save = new Review;
        $save->product_id = trim($request->product_id);
        $save->order_id = trim($request->order_id);
        $save->user_id = Auth::user()->id;
        $save->rating = trim($request->rating);
        $save->review = trim($request->review);
        $save->save();

        return redirect()->back()->with('success' , "Thank you for your review");
    }


}
