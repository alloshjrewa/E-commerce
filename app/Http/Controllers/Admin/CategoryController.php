<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Category";

        $data['getRecord'] = Category::getRecord();

        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Category";
        return view('admin.category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'slug'     => 'required|unique:categories',
            'status'    => 'required',
        ]);

        $category = new Category;
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->title = trim($request->title);
        $category->description = trim($request->description);
        $category->keywords = trim($request->keywords);
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/category/list')->with('success', "Category Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['header_title'] = "Edit Category";

        $data['getRecord'] = Category::getSingle($id);
        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required',
            'slug'     => 'required|unique:categories,slug,' . $id,
            'status'    => 'required',
        ]);
        $category = Category::getSingle($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->title = trim($request->title);
        $category->description = trim($request->description);
        $category->keywords = trim($request->keywords);
        $category->save();
        return redirect('admin/category/list')->with('success', "Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::getSingle($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->back()->with('success', "Category Deleted Successfully");
    }
}
