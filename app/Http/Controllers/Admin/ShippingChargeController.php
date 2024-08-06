<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Shipping_Charge;
use App\Http\Controllers\Controller;

class ShippingChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Shipping Charge";

        $data['getRecord'] = Shipping_Charge::getRecord();

        return view('admin.shippingcharge.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Discount Code";
        return view('admin.shippingcharge.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string',
            'price'     => 'required',
            'status'    => 'required',
        ]);

        $DiscountCode = new Shipping_Charge;
        $DiscountCode->name = trim($request->name);
        $DiscountCode->price = trim($request->price);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();
        return redirect('admin/shipping_charge/list')->with('success', "Shipping Charge Created Successfully");
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

        $data['getRecord'] = Shipping_Charge::getSingle($id);
        return view('admin.shippingcharge.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required|string',
            'price'     => 'required',
            'status'    => 'required',
        ]);

        $DiscountCode = Shipping_Charge::getSingle($id);
        $DiscountCode->name = trim($request->name);
        $DiscountCode->price = trim($request->price);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();

        return redirect('admin/shipping_charge/list')->with('success', "Shipping Charge Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DiscountCode = Shipping_Charge::getSingle($id);
        $DiscountCode->is_delete = 1;
        $DiscountCode->save();
        return redirect()->back()->with('success', "Shipping Charge Deleted Successfully");
    }
}

