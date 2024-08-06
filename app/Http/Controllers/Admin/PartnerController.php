<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{

    public function index()
    {
        $data['header_title'] = "Partner Logo";

        $data['getRecord'] = Partner::getRecord();

        return view('admin.partner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Partner";
        return view('admin.partner.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'status'     => 'required',
        ]);

        $save = new Partner;

        $save->link = trim($request->link);
        $save->status = trim($request->status);
        $save->save();
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $save->id.Str::random(20);
            $filename  = strtolower($randomStr) . '.' . $ext;
            $file->move('public/partner/', $filename);

            $save->image = trim($filename);
            $save->save();
        }

        return redirect('admin/partner/list')->with('success', "Partner Created Successfully");
    }

    public function edit(string $id)
    {
        $data['header_title'] = "Edit Partner";

        $data['getRecord'] = Partner::getSingle($id);
        return view('admin.partner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status'     => 'required',
        ]);

        $save = Partner::getSingle($id);
        $save->link = trim($request->link);
        $save->status = trim($request->status);
        $save->save();

        if (!empty($request->file('image'))) {
            $filePathName = 'public/partner/' . $save->image;
                if( file_exists($filePathName) ){

                unlink($filePathName);
                }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $save->id.Str::random(20);
            $filename  = strtolower($randomStr) . '.' . $ext;
            $file->move('public/partner/', $filename);

            $save->image = trim($filename);
            $save->save();
        }

        return redirect('admin/partner/list')->with('success', "Partner Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $save = Partner::getSingle($id);
        $filePathName = 'public/partner/' . $save->image;
        if( file_exists($filePathName) ){

        unlink($filePathName);
        }
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Partner Deleted Successfully");
    }
}

