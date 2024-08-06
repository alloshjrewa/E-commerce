@extends('layouts.app')
@section('style')
<style type="text/css">
.box-btn {
    padding: 10px;text-align: center;border-radius: 5px;box-shadow: 0 0 1px rgba(0, 0, 0, .125),0 1px 3px rgba(0, 0, 0,.2);background-color:#CC9966
}
.box-value {
    font-size: 20px;font-weight: normal;color: #000;
}
.box-head{
    font-size: 16px;color:#000
}
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Dashboard</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
                <div class="row">

                @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-3" style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Total Orders</div>
                                        <div class="box-value">{{ $TotalOrder }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Today Order</div>
                                        <div class="box-value">{{ $TodayOrder }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Total Amount</div>
                                        <div class="box-value">${{ number_format($TotalPayment,2) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Today Amount</div>
                                        <div class="box-value">${{ number_format($TodayPayment,2) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Pending Orders</div>
                                        <div class="box-value">{{ $TotalPending }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">In Progress Orders</div>
                                        <div class="box-value">{{ $TotalInProgress }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Completed Orders</div>
                                        <div class="box-value">{{ $TotalCompleted }}</div>
                                    </div>
                                </div>
                                <div class="col-md-3"  style="margin-bottom: 20px">
                                    <div class="box-btn">
                                        <div class="box-head">Cancelled Orders</div>
                                        <div class="box-value">{{ $TotalCancelled }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')

@endsection
