<?php

namespace App\Http\Controllers\Admin;

use auth;
use DateTime;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function dashboard(Request $request)
    {


        $data['TotalOrder'] = Order::getTotalOrder() ;
        $data['TodayOrder'] = Order::getTodayOrder() ;
        $data['TotalPayment'] = Order::getTotalPayment() ;
        $data['TodayPayment'] = Order::getTodayPayment() ;
        $data['TotalCustomer'] = User::getTotalCustomer() ;
        $data['TodayCustomer'] = User::getTodayCustomer() ;

        $data['LatestOrder'] = Order::getLatestOrder() ;

        $totalAmount = 0;
        if(!empty($request->year)){
            $year = $request->year;
        }else{
            $year = date('Y');
        }


        $getTotalCustomerMonth = '';
        $getTotalOrderMonth = '';
        $getTotalPaymentMonth = '';
        for($month=1 ; $month <= 12 ; $month++){
            $startDate = new DateTime("$year-$month-01");
            $endDate = new \DateTime("$year-$month-01");
            $endDate->modify('last day of this month');

            $start_Date = $startDate->format('Y-m-d');
            $end_Date = $endDate->format('Y-m-d');

            $customer = User::getTotalCustomerMonth($start_Date,$end_Date);
            $getTotalCustomerMonth .= $customer.',';

            $order = Order::getTotalOrderMonth($start_Date,$end_Date);
            $getTotalOrderMonth .= $order.',';

            $orderPayment = Order::getTotalPaymentMonth($start_Date,$end_Date);
            $getTotalPaymentMonth .= $orderPayment.',';

            $totalAmount = $totalAmount + $orderPayment;

        }

        $data['getTotalCustomerMonth'] = rtrim($getTotalCustomerMonth ,',');
        $data['getTotalOrderMonth'] = rtrim($getTotalOrderMonth ,',');
        $data['getTotalPaymentMonth'] = rtrim($getTotalPaymentMonth ,',');
        $data['totalAmount'] = $totalAmount;

        $data['year'] = $year;
        $data['header_title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }
}
