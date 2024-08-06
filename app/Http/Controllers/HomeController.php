<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Contact_Us;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Models\System_Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $getPage =Page::getSlug('home');
        $data['getPage'] = $getPage;
        $data['getSlider'] = Slider::getActiveRecord();
        $data['getPartner'] = Partner::getActiveRecord();

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;
        return view('home', $data);
    }
    public function contact(Request $request)
    {
        $first =  mt_rand(0,9);
        $second =  mt_rand(0,9);
        $data['first_number'] = $first;
        $data['second_number'] = $second;

        Session::put('total_sum' , $first + $second);
        $getPage =Page::getSlug('contact');
        $data['getPage'] = $getPage;
        $data['getSystemSettingApp'] = System_Setting::getSingle();
        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;


        return view('page.contact', $data);
    }
    public function submit_contact(Request $request){
        if(!empty($request->verification) && !empty(Session::get('total_sum'))){
        if(trim(Session::get('total_sum')) == trim($request->verification)){
            $save = new Contact_Us;
            if(!empty(Auth::check())){
                $save->user_id = Auth::user()->id;
            }

            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->phone = trim($request->phone);
            $save->subject = trim($request->subject);
            $save->message = trim($request->message);
            $save->save();
            $getSystemSettingApp = System_Setting::getSingle();
            Mail::to($getSystemSettingApp->submit_email)->send(new ContactUsMail($save));
            return redirect()->back()->with('success' , 'Your information Send Successfully');
        }

        else{
            return redirect()->back()->with('error' , 'Your Verifiction Sum Is Wrong');
        }
    }
    else{
        return redirect()->back()->with('error' , 'Your Verifiction Sum Is Empty');
    }
    }
    public function about(Request $request)
    {
        $getPage =Page::getSlug('about');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.about', $data);
    }
    public function faq(Request $request)
    {
        $getPage =Page::getSlug('faq');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.faq', $data);
    }
    public function payment_method(Request $request)
    {
        $getPage =Page::getSlug('payment-methods');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.payment_method', $data);
    }
    public function money_back_guarantee(Request $request)
    {
        $getPage =Page::getSlug('money-back-guarantee');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;


        return view('page.money_back_guarantee', $data);
    }
    public function return(Request $request)
    {
        $getPage =Page::getSlug('returns');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.return', $data);
    }
    public function shipping(Request $request)
    {
        $getPage =Page::getSlug('shippings');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.shipping', $data);
    }
    public function terms_conditions(Request $request)
    {
        $getPage =Page::getSlug('terms-conditions');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.terms_conditions', $data);
    }
    public function privacy_policy(Request $request)
    {
        $getPage =Page::getSlug('privacy-policy');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->title;
        $data['meta_description'] = $getPage->description;
        $data['meta_keywords'] = $getPage->keywords;

        return view('page.privacy_policy', $data);
    }
}
