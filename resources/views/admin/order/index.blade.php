@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts._messages')
                        <form method="get" action="">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Orders Search</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" name="id" placeholder="ID" class="form-control" value="{{Request::get('id')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name" placeholder="Company Name" class="form-control" value="{{ Request::get('company_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ Request::get('first_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ Request::get('last_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" placeholder="Email" class="form-control" value="{{ Request::get('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ Request::get('phone') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>PostalCode</label>
                                                <input type="text" name="postalcode" placeholder="PostalCode" class="form-control" value="{{ Request::get('postalcode') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" placeholder="Country" class="form-control" value="{{ Request::get('country') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" name="state" placeholder="State" class="form-control" value="{{ Request::get('state') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" placeholder="City" class="form-control" value="{{ Request::get('city') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="date" style="padding: 6px;" name="from_date" class="form-control" value="{{ Request::get('from_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="date"  style="padding: 6px;" name="to_date" class="form-control" value="{{ Request::get('to_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button  class="btn "style="background: #0084D1;color:#fff">Search</button>
                                            <a href ="{{ url('admin/order/list') }}" class="btn" style="background: #5CC6FF;color:#fff">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow:auto;">
                                <table class="table table-striped" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Number</th>
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Country</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Postalcode</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Total Amount($)</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->order_number }}</td>
                                                <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                                <td>{{ $value->company_name }}</td>
                                                <td>{{ $value->country }}</td>
                                                <td>{{ $value->address_one }}<br/> {{ $value->address_two }}</td>
                                                <td>{{ $value->city }}</td>
                                                <td>{{ $value->state }}</td>
                                                <td>{{ $value->postalcode }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ number_format($value->total_amount,2) }}</td>
                                                <td>
                                                    <select class="form-control ChangeStatus" id="{{ $value->id }}" style="width:100px;">
                                                        <option  {{ ($value->status == 0) ? 'selected' : '' }} value="0">Pending</option>
                                                        <option  {{ ($value->status == 1) ? 'selected' : '' }} value="1">In Progress</option>
                                                        <option  {{ ($value->status == 2) ? 'selected' : '' }} value="2">Delivered</option>
                                                        <option  {{ ($value->status == 3) ? 'selected' : '' }} value="3">Completed</option>
                                                        <option  {{ ($value->status == 4) ? 'selected' : '' }} value="4">Cancelled</option>
                                                    </select>
                                                </td>
                                                <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href='{{ url('admin/order/detail/' . $value->id) }}'
                                                        class="btn btn-sm" style="background: #CD9A6A;color:#fff">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px;float: right;">
                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection

@section('script')
<script type="text/javascript">

    $('body').delegate('.ChangeStatus' , 'change' , function(){
        var status = $(this).val();
        var order_id = $(this).attr('id');

        $.ajax({
                type : "GET" ,
                url  : "{{url('/admin/order_status/')}}",
                data : {

                    status : status,
                    order_id : order_id
                },
                dataType : "json",
                success  : function(data){
                    alert(data.message);
                },
                error : function(data){
                    alert(data.message);
                }
            });
    });
</script>
@endsection
