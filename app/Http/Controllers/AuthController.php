<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login_admin()
    {
        if (!empty(Auth::check() && Auth::user()->is_admin == 1)) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }
    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 1, 'is_delete' => 0], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', "Please Enter Currect Email Or Password");
        }
    }
    public function logout_admin()
    {
        Auth::logout();
        return redirect(url(''));
    }


    // Front Side

    public function auth_register(Request $request){
        $checkEmail = User::checkEmail($request->email);

        if(empty($checkEmail)){
                $user = new User;
                $user->name = trim($request->name);
                $user->email = trim($request->email);
                $user->password = Hash::make($request->name);
                $user->save();

                Mail::to($user->email)->send(new RegisterMail($user));
                $json['status'] = true;
                $json['message'] = 'Your Account Created Successfully , please verify your email address';
        }else{
            $json['status'] = false;
            $json['message'] = 'This Email Already Registered , Please Choose Another';
        }
        echo json_encode($json);

    }

    public function activate_email($id){
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with('success' , "Email Verified Successfully");
    }

    public function auth_login(Request $request){
        $remember = !empty($request->is_remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_delete' => 0], $remember)) {
            if(!empty(Auth::user()->email_verified_at))
            {
                $json['status'] = true;
                $json['message'] = 'Success';
            }
            else{
                $user =User::getSingle(Auth::user()->id);
                Mail::to($user->email)->send(new RegisterMail($user));
                Auth::logout();
                $json['status'] = false;
                $json['message'] = 'Your Email Not Verified , Please Check Your Inbox And Verified It';
            }

        } else {
            $json['status'] = false;
            $json['message'] = "Please Enter Correct Email Or Password";
        }
        echo json_encode($json);

    }

    public function forgot_password(Request $request){
        $data['meta_title'] = "Forgot Password";
        return view('auth.forgot' , $data);
    }
    public function auth_forgot_password(Request $request){
        $user = User::where('email' , '=' , $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
           return redirect()->back()->with("success" , "Please check your email and reset your password");
    }else{
        return redirect()->back()->with("error" , "Email not found in the system");
    }

    }

    public function reset($token){
        $user =  User::where('remember_token' , '=' , $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            $data['meta_title'] = "Reset Password";
            return view('auth.reset' , $data);
        }else{
            abort(404);
        }
    }

    public function auth_reset( $token ,Request $request){
        if($request->password == $request->cpassword){
            $user =  User::where('remember_token' , '=' , $token)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect(url(''))->with("success" , "Password Reseted Successfully");
        }else{
            return redirect()->back()->with("error" , "Password and Confirm Password does not match");
        }
    }
}
