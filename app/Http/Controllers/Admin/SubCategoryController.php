<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Sub_Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Sub Category";

        $data['getRecord'] = Sub_Category::getRecord();

        return view('admin.subcategory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['getCategories'] = Category::getRecord();
        $data['header_title'] = "Add New Sub Category";

        return view('admin.subcategory.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'category_id' => 'required',
            'slug'     => 'required|unique:sub_categories',
            'status'    => 'required',
        ]);

        $sub_category = new Sub_Category;
        $sub_category->name = trim($request->name);
        $sub_category->category_id = trim($request->category_id);
        $sub_category->slug = trim($request->slug);
        $sub_category->status = trim($request->status);
        $sub_category->title = trim($request->title);
        $sub_category->description = trim($request->description);
        $sub_category->keywords = trim($request->keywords);
        $sub_category->created_by = Auth::user()->id;
        $sub_category->save();
        return redirect('admin/sub_category/list')->with('success', "Sub Category Created successfully ");
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
        $data['header_title'] = "Edit Sub Category";
        $data['getCategories'] = Category::getRecord();
        $data['getRecord'] = Sub_Category::getSingle($id);
        return view('admin.subcategory.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required',
            'category_id' => 'required',
            'slug'     => 'required|unique:sub_categories,slug,' . $id,
            'status'    => 'required',
        ]);
        $sub_category = Sub_Category::getSingle($id);
        $sub_category->name = trim($request->name);
        $sub_category->category_id = trim($request->category_id);
        $sub_category->slug = trim($request->slug);
        $sub_category->status = trim($request->status);
        $sub_category->title = trim($request->title);
        $sub_category->description = trim($request->description);
        $sub_category->keywords = trim($request->keywords);
        $sub_category->save();
        return redirect('admin/sub_category/list')->with('success', "Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sub_category = Sub_Category::getSingle($id);
        $sub_category->is_delete = 1;
        $sub_category->save();
        return redirect()->back()->with('success', "Category Deleted Successfully");
    }
    public function get_sub_category(Request $request)
    {
        $category_id = $request->id;
        $get_sub_category = Sub_Category::getRecordSubCategory($category_id);
        $html[] = '';
        $html[] = '<option value="">Select</option>';
        foreach ($get_sub_category as $value) {
            $html[] = '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        $json['html'] = $html;
        echo json_encode($json);
    }
}
