@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right">
                        <a href='{{ url('admin/admin/create') }}' class="btn btn-primary">Add New
                            Admin</a>
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
                                <h3 class="card-title">Admin List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->status == 0 ? 'inActive' : 'Active' }}</td>
                                                <td>
                                                    <a href='{{ url('admin/admin/edit/' . $value->id) }}'
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href='{{ url('admin/admin/delete/' . $value->id) }}'
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
