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
                        <h1>Edit Page</h1>
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
                            <form action="{{ route('page.update', [$getRecord->id]) }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name" required
                                            value="{{$getRecord->name}}" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="slug" required
                                            value="{{$getRecord->slug}}" placeholder="Enter Slug">
                                    </div>

                                    <div class="form-group">
                                        <label>Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="title" required
                                            value="{{$getRecord->title}}" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        @if(!empty($getRecord->getImage()))
                                        <img style="width:200px" src="{{$getRecord->getImage()}}" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control editor" name="description">{{$getRecord->description}}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>KeyWords </label>
                                        <input type="text" class="form-control" name="keywords"
                                            value="{{$getRecord->keywords}}" placeholder="Enter keywords">
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
<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript">
    //summernote editor
    $('.editor').summernote({
        height : 200
    });
    </script>
@endsection
