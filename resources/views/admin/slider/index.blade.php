@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slider List
                    </div>
                    <div class="col-sm-6" style="text-align: right ">
                        <a href='{{ url('admin/slider/create') }}' class="btn btn-primary">Add New
                            Slider</a>
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
                                <h3 class="card-title">Slider List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Button Name</th>
                                            <th>Button Link</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>
                                                    @if(!empty($value->getImage()))
                                                        <img src="{{ $value->getImage() }}" style="height: 100px" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->button_name }}</td>
                                                <td>{{ $value->button_link }}</td>
                                                <td>{{ $value->status == 0 ? 'inActive' : 'Active' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href='{{ url('admin/slider/edit/' . $value->id) }}'
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href='{{ url('admin/slider/delete/' . $value->id) }}'
                                                        class="btn btn-danger btn-sm">Delete
                                                    </a>
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
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
