@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add New Category</h1>
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
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="{{ old('name') }}" placeholder="Enter Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="slug" required
                                            value="{{ old('slug') }}" placeholder="Enter Slug For URL">
                                        <div style="color: red"> {{ $errors->first('slug') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control editor" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>KeyWords</label>
                                        <input type="text" class="form-control" name="keywords"
                                            value="{{ old('keywords') }}" placeholder="Enter KeyWords">
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
<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript">
    //summernote editor
    $('.editor').summernote({
        height : 200
    });
    </script>
@endsection
