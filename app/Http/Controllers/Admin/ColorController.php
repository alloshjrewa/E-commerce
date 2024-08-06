<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Color";

        $data['getRecord'] = Color::getRecord();

        return view('admin.color.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Color";
        return view('admin.color.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'code'     => 'required|unique:colors',
            'status'    => 'required',
        ]);

        $color = new Color;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();
        return redirect('admin/color/list')->with('success', "Color Created Successfully");
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
        $data['header_title'] = "Edit Color";

        $data['getRecord'] = Color::getSingle($id);
        return view('admin.color.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required',
            'code'     => 'required|unique:colors,code,' . $id,
            'status'    => 'required',
        ]);
        $color = Color::getSingle($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->save();
        return redirect('admin/color/list')->with('success', "Color Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::getSingle($id);
        $color->is_delete = 1;
        $color->save();
        return redirect()->back()->with('success', "Color Deleted Successfully");
    }
}
