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
                        <h1>Edit Product</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('admin.layouts._messages')

                        <div class="card card-primary">
                            <!-- Form Start -->
                            <form action="{{ route('product.update', [$product->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="title" required
                                                    value="{{ old('title', $product->title) }}" placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SKU <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="sku" required
                                                    value="{{ old('sku', $product->sku) }}" placeholder="SKU">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category <span style="color: red">*</span></label>
                                                <select class="form-control" name="category_id" id="ChangeCategory"
                                                    required>
                                                    <option value="">Select</option>
                                                    @foreach ($getCategory as $category)
                                                        <option
                                                            {{ $product->category_id == $category->id ? 'Selected' : '' }}
                                                            value="{{ $category->id }}">
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sub Category <span style="color: red">*</span></label>
                                                <select class="form-control" name="sub_category_id" id="getSubCategory"
                                                    required>
                                                    <option value="">Select</option>
                                                    @foreach ($getSubCategory as $subcategory)
                                                        <option
                                                            {{ $product->sub_category_id == $subcategory->id ? 'Selected' : '' }}
                                                            value="{{ $subcategory->id }}">
                                                            {{ $subcategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand <span style="color: red">*</span></label>
                                                <select class="form-control" name="brand_id" required>
                                                    <option value="">Select</option>
                                                    @foreach ($getBrand as $brand)
                                                        <option {{ $product->brand_id == $brand->id ? 'Selected' : '' }}
                                                            value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color <span style="color: red">*</span></label>
                                                @foreach ($getColor as $color)
                                                    @php
                                                        $checked = '';
                                                    @endphp
                                                    @foreach ($product->getColor as $pcolor)
                                                        @if ($pcolor->color_id == $color->id)
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <div><label><input {{ $checked }} type="checkbox"
                                                                name="color_id[]"
                                                                value="{{ $color->id }}">{{ $color->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="price" required
                                                    placeholder="Price" value="{{ $product->price }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old Price <span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="old_price"
                                                    placeholder="Old Price" value="{{ $product->old_price }} ">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Size <span style="color: red">*</span></label>
                                                <div>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='AppendSize'>
                                                            @php
                                                                $i_size = 1;
                                                            @endphp
                                                            @foreach ($product->getSize as $size)
                                                                <tr id="DeleteSize{{ $i_size }}">
                                                                    <td>
                                                                        <input type="text"
                                                                            name="size[{{ $i_size }}][name]"
                                                                            value="{{ $size->name }}" placeholder="name"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text"
                                                                            name="size[{{ $i_size }}][price]"
                                                                            value="{{ $size->price }}" placeholder="price"
                                                                            class="form-control">
                                                                    </td>
                                                                    <td style="width:200px">
                                                                        <button type = "button" id="{{ $i_size }}"
                                                                            class="btn btn-danger DeleteSize ">Delete</button>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $i_size++;
                                                                @endphp
                                                            @endforeach
                                                            <tr>
                                                                <td>
                                                                    <input type="text" name="size[100][name]"
                                                                        placeholder="name" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="size[100][price]"
                                                                        placeholder="price" class="form-control">
                                                                </td>
                                                                <td style="width:200px">
                                                                    <button type="button"
                                                                        class="btn btn-info AddSize">Add</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image <span style="color: red">*</span></label>
                                                <input type="file" name="image[]" style="padding: 5px"
                                                    class="form-control" multiple accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($product->getImage->count()))
                                        <div class="row" id="sortable">
                                            @foreach ($product->getImage as $image)
                                                @if (!empty($image->getUploadedImage()))
                                                    <div class="col-md-2 sortable_image" style="text-align:center"
                                                        id={{ $image->id }}>
                                                        <img style="width:100%;height:120px"
                                                            src="{{ $image->getUploadedImage() }}" alt="">
                                                        <a onclick="return confirm('Are You Sure You Want To  Delete This Image?')"
                                                            href="{{ url('admin/product/image_delete/' . $image->id) }}"
                                                            style="margin-top:10px"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Short Description <span style="color: red">*</span></label>
                                                <textarea class="form-control" name="short_description" placeholder="Short Description"> {{ $product->short_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description <span style="color: red">*</span></label>
                                                <textarea class="form-control editor" name="description" placeholder="Description"> {{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Additional Information <span style="color: red">*</span></label>
                                                <textarea class="form-control editor" name="additional_information" placeholder="Additional Information"> {{ $product->additional_information }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping Returns <span style="color: red">*</span></label>
                                                <textarea class="form-control editor" name="shipping_returns" placeholder="Shipping Returns">{{ $product->shipping_returns }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status <span style="color: red">*</span></label>
                                                <select class="form-control" name="status">
                                                    <option {{ $product->status == 0 ? 'selected' : '' }} value="0">
                                                        inActive
                                                    </option>
                                                    <option {{ $product->status == 1 ? 'selected' : '' }} value="1">
                                                        Active
                                                    </option>
                                                </select>
                                            </div>
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
    <script src="{{ url('public/sortable/jquery-ui.js') }}"></script>

    <script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script type="text/javascript">
        //summernote editor
        $('.editor').summernote({
            height : 200
        });

        //sortable code
        $(document).ready(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    var photo_id = new Array();
                    $('.sortable_image').each(function() {
                        var id = $(this).attr('id');
                        photo_id.push(id);
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/product_image_sortable') }}",
                        data: {
                            "photo_id": photo_id,
                            "_token": "{{ csrf_token() }}"

                        },
                        dataType: "json",
                        success: function(data) {},
                        error: function(data) {

                        }
                    });

                }
            });
        });


        // Add Button Size

        var i = 101;
        $('body').delegate('.AddSize', 'click', function() {
            var html =
                '<tr id="DeleteSize' + i +
                '">\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td>\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type = " text " name="size[' +
                i +
                '][name]" placeholder="name" class = "form-control ">\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td>\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type = " text " name="size[' +
                i +
                '][price]" placeholder="price" class = " form-control ">\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </td>\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td>\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button type = "button" id="' +
                i +
                '"class = "btn btn-danger DeleteSize " > Delete </button>\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td >\n\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>';
            i++
            $('#AppendSize').append(html);
        });

        // Delete Button Size

        $('body').delegate('.DeleteSize', 'click', function() {
            var id = $(this).attr('id');
            $("#DeleteSize" + id).remove();
        });


        //Change Category
        $('body').delegate('#ChangeCategory', 'change', function(e) {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/get_sub_category') }}",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#getSubCategory').html(data.html);
                },
                error: function(data) {

                }
            });
        });


    </script>
@endsection
