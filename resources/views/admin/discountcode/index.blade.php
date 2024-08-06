@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Discount Code List
                    </div>
                    <div class="col-sm-6" style="text-align: right ">
                        <a href='{{ url('admin/discount_code/create') }}' class="btn btn-primary">Add New
                            Discount Code</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('admin.layouts._messages')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Discount Code List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Percent / Amount</th>
                                            <th>Expite Date</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->type }}</td>
                                                <td>{{ $value->percent_amount }}</td>
                                                <td>{{ $value->expire_date }}</td>
                                                <td>{{ $value->status == 0 ? 'inActive' : 'Active' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href='{{ url('admin/discount_code/edit/' . $value->id) }}'
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href='{{ url('admin/discount_code/delete/' . $value->id) }}'
                                                        class="btn btn-danger btn-sm">Delete
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
