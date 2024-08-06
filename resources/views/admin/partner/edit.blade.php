@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Partner</h1>
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
                            <form action="{{ route('partner.update', [$getRecord->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        @if(!empty($getRecord->getImage()))
                                            <img src="{{ $getRecord->getImage() }}" style="height: 100px" alt="">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Link </label>
                                        <input type="text" class="form-control" name="link"
                                            value="{{ $getRecord->link }}" placeholder="Enter Partner Link">
                                    </div>


                                    <div class="form-group">
                                        <label>Status <span style="color: red">*</span></label>
                                        <select class="form-control" name="status">
                                            <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">inActive
                                            </option>
                                            <option {{ $getRecord->status  == 1 ? 'selected' : '' }} value="1">Active
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
