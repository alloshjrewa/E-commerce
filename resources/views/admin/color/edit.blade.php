@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Color</h1>
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
                            <form action="{{ route('color.update', [$getRecord->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Color Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="{{ old('name', $getRecord->name) }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Code <span style="color: red">*</span></label>
                                        <input type="color" class="form-control" name="code" required
                                            value="{{ old('code', $getRecord->code) }}" placeholder="Enter Color Code">
                                        <div style="color: red"> {{ $errors->first('code') }}</div>
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
