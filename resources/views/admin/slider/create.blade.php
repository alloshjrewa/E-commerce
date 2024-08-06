@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add New Slider</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <!-- Form Start -->
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" placeholder="Enter Slider Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Image <span style="color: red">*</span></label>
                                        <input type="file" class="form-control" name="image" >
                                    </div>
                                    <div class="form-group">
                                        <label>Button Name </label>
                                        <input type="text" class="form-control" name="button_name"
                                            value="{{ old('button_name') }}" placeholder="Enter Button Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Button Link </label>
                                        <input type="text" class="form-control" name="button_link"
                                            value="{{ old('button_link') }}" placeholder="Enter Button Link">
                                    </div>


                                    <div class="form-group">
                                        <label>Status <span style="color: red">*</span></label>
                                        <select class="form-control" name="status">
                                            <option {{ old('status') == 0 ? 'selected' : '' }} value="0">inActive
                                            </option>
                                            <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
