@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Shipping Charge</h1>
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
                            <form action="{{ route('shipping_charge.update', [$getRecord->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Shipping Charge Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="{{ old('name', $getRecord->name) }}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label> Price <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" name="price" required
                                            value="{{ old('price',$getRecord->price) }}" placeholder="Price">
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
