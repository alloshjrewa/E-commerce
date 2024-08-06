@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>System Setting</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @include('admin.layouts._messages')
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <!-- Form Start -->
                            <form action="{{ route('update_system_setting') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Website Name</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->website_name }}" name="website_name">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                        @if(!empty($getRecord->getLogo()))
                                        <img src="{{ $getRecord->getLogo() }}" alt="" style="width: 200px">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Fevicon</label>
                                        <input type="file" class="form-control" name="fevicon">
                                        @if(!empty($getRecord->getFevicon()))
                                        <img src="{{ $getRecord->getFevicon() }}" alt="" style="width: 50px">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Footer Description</label>
                                       <textarea class="form-control" name="footer_description">{{ $getRecord->footer_description }}</textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Footer Payment Icon</label>
                                        <input type="file" class="form-control" name="footer_payment_icon">
                                        @if(!empty($getRecord->getFooterPayment()))
                                        <img src="{{ $getRecord->getFooterPayment() }}" alt="" style="width: 200px">
                                        @endif
                                    </div>
                                </div>
                                <hr />
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Address</label>
                                       <textarea class="form-control" name="address">{{ $getRecord->address }}</textarea>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->phone }}" name="phone">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->phone_two }}" name="phone_two">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Submit Contact Email</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->submit_email }}" name="submit_email">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->email }}" name="email">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email 2</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->email_two }}" name="email_two">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Working Hour</label>
                                       <textarea class="form-control"  name="working_hour"> {{$getRecord->working_hour }}</textarea>
                                    </div>
                                </div>
                                <hr/>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->facebook_link }}" name="facebook_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Twitter Link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->twitter_link }}" name="twitter_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Instagram Link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->instagram_link }}" name="instagram_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Youtube Link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->youtube_link }}" name="youtube_link">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pinterest Link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->pinterest_link }}" name="pinterest_link">
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
