<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Discount_Code;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Discount Code";

        $data['getRecord'] = Discount_Code::getRecord();

        return view('admin.discountcode.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Discount Code";
        return view('admin.discountcode.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'type'     => 'required|string',
            'percent_amount' => 'required',
            'expire_date'   => 'required|date',
            'status'    => 'required',
        ]);

        $DiscountCode = new Discount_Code;
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();
        return redirect('admin/discount_code/list')->with('success', "Discount Code Created Successfully");
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
        $data['header_title'] = "Edit Discount Code";

        $data['getRecord'] = Discount_Code::getSingle($id);
        return view('admin.discountcode.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string',
            'type'     => 'required|string',
            'percent_amount' => 'required',
            'expire_date'   => 'required|date',
            'status'    => 'required',
        ]);

        $DiscountCode = Discount_Code::getSingle($id);
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();

        return redirect('admin/discount_code/list')->with('success', "Discount Code Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DiscountCode = Discount_Code::getSingle($id);
        $DiscountCode->is_delete = 1;
        $DiscountCode->save();
        return redirect()->back()->with('success', "Discount Code Deleted Successfully");
    }
}
