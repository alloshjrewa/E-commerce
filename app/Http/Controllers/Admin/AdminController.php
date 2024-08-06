<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Admin";

        $data['getRecord'] = User::getAdmin();

        return view('admin.admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'status'    => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = 1;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/admin/list')->with('success', "Admin Created Successfully");
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
        $data['header_title'] = "Edit Admin";

        $data['getRecord'] = User::getSingle($id);
        return view('admin.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,' . $id,
            'status'    => 'required'
        ]);
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = 1;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/admin/list')->with('success', "Admin Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->back()->with('success', "Record Deleted Successfully");
    }

    public function customer_list(){
        $data['header_title'] = "Customer";

        $data['getRecord'] = User::getCustomer();

        return view('admin.customer.index', $data);
    }
}
