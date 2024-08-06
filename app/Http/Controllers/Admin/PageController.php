<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Contact_Us;
use App\Models\Product_Image;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System_Setting;

class PageController extends Controller
{
    // Contact Us
    public function contact_us(){
        $data['header_title'] = "Contact Us";

        $data['getRecord'] = Contact_Us::getRecord();

        return view('admin.contact_us.list', $data);
    }
    public function contact_us_delete($id){
        Contact_Us::where('id' , '=' , $id)->delete();

        return redirect()->back()->with('success' , 'Record Deleted Successfully');
    }
    public function index()
    {
        $data['header_title'] = "Page";

        $data['getRecord'] = Page::getRecord();

        return view('admin.page.index', $data);
    }
    public function create()
    {
        $data['header_title'] = "Add New Page";
        return view('admin.page.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'slug'     => 'required',
            'title'    => 'required',
        ]);

        $DiscountCode = new Page;
        $DiscountCode->name = trim($request->name);
        $DiscountCode->slug = trim($request->slug);
        $DiscountCode->title = trim($request->title);
        $DiscountCode->save();
        return redirect('admin/page/list')->with('success', "Page Created Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['header_title'] = "Edit Page";

        $data['getRecord'] = Page::getSingle($id);
        return view('admin.page.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string',
            'slug'     => 'required',
            'title'    => 'required',
        ]);

        $page = Page::getSingle($id);
        $page->name = trim($request->name);
        $page->slug = trim($request->slug);
        $page->title = trim($request->title);
        $page->description = trim($request->description);
        $page->keywords = trim($request->keywords);
        $page->save();

        if (!empty($request->file('image'))) {
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();
                    $randomStr = $page->id.Str::random(20);
                    $filename  = strtolower($randomStr) . '.' . $ext;
                    $file->move('public/page/', $filename);

                    $page->image = trim($filename);
                    $page->save();
        }

        return redirect('admin/page/list')->with('success', "Page Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DiscountCode = Page::getSingle($id);
        $DiscountCode->is_delete = 1;
        $DiscountCode->save();
        return redirect()->back()->with('success', "Shipping Charge Deleted Successfully");
    }

    //system setting

    public function system_setting(){
        $data['getRecord'] = System_Setting::getSingle();
        $data['header_title'] = "System Setting";
        return view('admin.setting.system_setting', $data);
    }
    public function update_system_setting(Request $request){
        $save = System_Setting::getSingle();
        $save->website_name = trim($request->website_name);
        $save->footer_description = trim($request->footer_description);
        $save->address = trim($request->address);
        $save->phone = trim($request->phone);
        $save->phone_two = trim($request->phone_two);
        $save->submit_email = trim($request->submit_email);
        $save->email = trim($request->email);
        $save->email_two = trim($request->email_two);
        $save->working_hour = trim($request->working_hour);
        $save->facebook_link = trim($request->facebook_link);
        $save->twitter_link = trim($request->twitter_link);
        $save->instagram_link = trim($request->instagram_link);
        $save->youtube_link = trim($request->youtube_link);
        $save->pinterest_link = trim($request->pinterest_link);
        $save->save();

        if (!empty($request->file('logo'))) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = "Logo";
            $filename  = strtolower($randomStr) . '.' . $ext;
            $file->move('public/setting/', $filename);

            $save->logo = trim($filename);
            $save->save();
            }
            if (!empty($request->file('fevicon'))) {
                $file = $request->file('fevicon');
                $ext = $file->getClientOriginalExtension();
                $randomStr = "Fevicon";
                $filename  = strtolower($randomStr) . '.' . $ext;
                $file->move('public/setting/', $filename);

                $save->fevicon = trim($filename);
                $save->save();
                }
                if (!empty($request->file('footer_payment_icon'))) {
                    $file = $request->file('footer_payment_icon');
                    $ext = $file->getClientOriginalExtension();
                    $randomStr = "footer_payment_icon";
                    $filename  = strtolower($randomStr) . '.' . $ext;
                    $file->move('public/setting/', $filename);

                    $save->footer_payment_icon = trim($filename);
                    $save->save();
                    }

        return redirect()->back()->with('success', "Setting Updated Successfully");
    }

}
