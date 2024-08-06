<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderStatusMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title'] = "Orders";

        $data['getRecord'] = Order::getRecord();

        return view('admin.order.index', $data);
    }
    public function detail($id)
    {
        $data['header_title'] = "Order Detail";

        $data['getRecord'] = Order::getSingle($id);

        return view('admin.order.detail', $data);
    }
    public function order_status(Request $request){
        $getOrder = Order::getSingle($request->order_id);
        $getOrder->status = $request->status;
        $getOrder->save();

        Mail::to($getOrder->email)->send(new OrderStatusMail($getOrder));

        $json['message'] = "Status Updated Successfully";
        echo json_encode($json);
    }
}
