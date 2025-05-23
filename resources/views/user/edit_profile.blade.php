@extends('layouts.app')
@section('style')

@endsection
@section('content')
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Edit Profile</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">

                <br/>
                <div class="row">

                @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            @include('layouts._message')
                            <form action="{{ url('user/edit-profile') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6">
                                                <label>First Name *</label>
                                                <input type="text" name="first_name" value="{{ $getRecord->name }}" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" name="last_name" value="{{ $getRecord->last_name }}" class="form-control" required>
                                            </div>

                                        </div>
                                        <label>Email </label>
                                        <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" readonly>

                                        <label>Company Name (Optional)</label>
                                        <input type="text" name="company_name" value="{{ $getRecord->company_name }}" class="form-control">

                                        <label>Country *</label>
                                        <input type="text" name="country" value="{{ $getRecord->country }}" class="form-control" required>

                                        <label>Street address *</label>
                                        <input type="text" name="address_one" value="{{ $getRecord->address_one }}" class="form-control" placeholder="House number and Street name" required>
                                        <input type="text" name="address_two" value="{{ $getRecord->address_two }}" class="form-control" placeholder="Appartments, suite, unit etc ..." >

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Town / City *</label>
                                                <input type="text" name="city" value="{{ $getRecord->city }}" class="form-control" required>
                                            </div>


                                            <div class="col-sm-6">
                                                <label>State *</label>
                                                <input type="text" name="state" value="{{ $getRecord->state }}" class="form-control" required>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Postalcode / ZIP *</label>
                                                <input type="text" name="postalcode" value="{{ $getRecord->postalcode }}"  class="form-control" required>
                                            </div>


                                            <div class="col-sm-6">
                                                <label>Phone *</label>
                                                <input type="tel" name="phone"  value="{{ $getRecord->phone }}" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-lg">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')

@endsection
