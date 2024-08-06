<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function index()
    {
        $data['header_title'] = "Slider";

        $data['getRecord'] = Slider::getRecord();

        return view('admin.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Slider";
        return view('admin.slider.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status'     => 'required',
        ]);

        $save = new Slider;
        $save->title = trim($request->title);
        $save->button_name = trim($request->button_name);
        $save->button_link = trim($request->button_link);
        $save->status = trim($request->status);
        $save->save();
        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $save->id.Str::random(20);
            $filename  = strtolower($randomStr) . '.' . $ext;
            $file->move('public/slider/', $filename);

            $save->image = trim($filename);
            $save->save();
        }

        return redirect('admin/slider/list')->with('success', "Slider Created Successfully");
    }

    public function edit(string $id)
    {
        $data['header_title'] = "Edit Slider";

        $data['getRecord'] = Slider::getSingle($id);
        return view('admin.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status'     => 'required',
        ]);

        $save = Slider::getSingle($id);
        $save->title = trim($request->title);
        $save->button_name = trim($request->button_name);
        $save->button_link = trim($request->button_link);
        $save->status = trim($request->status);
        $save->save();

        if (!empty($request->file('image'))) {
            $filePathName = 'public/slider/' . $save->image;
                if( file_exists($filePathName) ){

                unlink($filePathName);
                }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $save->id.Str::random(20);
            $filename  = strtolower($randomStr) . '.' . $ext;
            $file->move('public/slider/', $filename);

            $save->image = trim($filename);
            $save->save();
        }

        return redirect('admin/slider/list')->with('success', "Slider Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $save = Slider::getSingle($id);
        $filePathName = 'public/slider/' . $save->image;
        if( file_exists($filePathName) ){

        unlink($filePathName);
        }
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Slider Deleted Successfully");
    }
}

