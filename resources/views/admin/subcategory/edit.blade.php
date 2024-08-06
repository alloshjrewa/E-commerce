@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Category</h1>
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
                            <form action="{{ route('sub_category.update', [$getRecord->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Sub Category Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="{{ old('name', $getRecord->name) }}"
                                            placeholder="Enter Sub Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name <span style="color: red">*</span></label>
                                        <select class="form-control" name="category_id" required>
                                            <option value="">Select</option>
                                            @foreach ($getCategories as $value)
                                                <option {{ $value->id == $getRecord->category_id ? 'selected' : '' }}
                                                    value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="slug" required
                                            value="{{ old('slug', $getRecord->slug) }}" placeholder="Enter Slug For URL">
                                        <div style="color: red"> {{ $errors->first('slug') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $getRecord->title) }}" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Description">{{ old('description', $getRecord->description) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>KeyWords</label>
                                        <input type="text" class="form-control" name="keywords"
                                            value="{{ old('keywords', $getRecord->keywords) }}"
                                            placeholder="Enter KeyWords">
                                    </div>

                                    <div class="form-group">
                                        <label>Status <span style="color: red">*</span></label>
                                        <select class="form-control" name="status">
                                            <option {{ old('status', $getRecord->status) == 0 ? 'selected' : '' }}
                                                value="0">inActive
                                            </option>
                                            <option {{ old('status', $getRecord->status) == 1 ? 'selected' : '' }}
                                                value="1">Active
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
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
