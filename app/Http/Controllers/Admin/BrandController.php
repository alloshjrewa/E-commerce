<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Brand";

        $data['getRecord'] = Brand::getRecord();

        return view('admin.brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Brand";
        return view('admin.brand.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'slug'     => 'required|unique:brands',
            'status'    => 'required',
        ]);

        $brand = new Brand;
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = trim($request->status);
        $brand->title = trim($request->title);
        $brand->description = trim($request->description);
        $brand->keywords = trim($request->keywords);
        $brand->created_by = Auth::user()->id;
        $brand->save();
        return redirect('admin/brand/list')->with('success', "Brand Created Successfully");
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
        $data['header_title'] = "Edit Brand";

        $data['getRecord'] = Brand::getSingle($id);
        return view('admin.brand.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required',
            'slug'     => 'required|unique:brands,slug,' . $id,
            'status'    => 'required',
        ]);
        $brand = Brand::getSingle($id);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = trim($request->status);
        $brand->title = trim($request->title);
        $brand->description = trim($request->description);
        $brand->keywords = trim($request->keywords);
        $brand->save();
        return redirect('admin/brand/list')->with('success', "Brand Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();
        return redirect()->back()->with('success', "Brand Deleted Successfully");
    }
}
