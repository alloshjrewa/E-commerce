@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">
@endsection
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url($getProduct->getCategory->slug) }}">{{ $getProduct->getCategory->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ url($getProduct->getCategory->slug . '/' . $getProduct->getSubCategory->slug ) }}">{{ $getProduct->getSubCategory->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getProduct->title }}</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                @php
                                    $getProductImage = $getProduct->getSingleImage($getProduct->id);
                                @endphp
                                @if (!empty($getProductImage) && !empty($getProductImage->getUploadedImage()))
                                <img id="product-zoom" src="{{ $getProductImage->getUploadedImage() }}" data-zoom-image="{{ $getProductImage->getUploadedImage() }}" alt="product image">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                                @endif
                            </figure><!-- End .product-main-image -->

                            <div id="product-zoom-gallery" class="product-image-gallery">
                                @foreach ($getProduct->getImage as $image )
                                <a class="product-gallery-item" href="#" data-image="{{ $image->getUploadedImage() }}" data-zoom-image="">
                                    <img src="{{ $image->getUploadedImage() }}" alt="product side">
                                </a>
                                @endforeach

                            </div><!-- End .product-image-gallery -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $getProduct->title }}</h1>

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width:  {{ $getProduct->getReviewRating($getProduct->id) }}%;"></div>
                                </div>
                                <a class="ratings-text" href="#product-review-link" id="review-link">(  {{ $getProduct->getTotalReview() }} Reviews )</a>
                            </div>

                            <div class="product-price">
                                $<span id= "getTotalPrice">{{ number_format($getProduct->price,2) }}</span>
                            </div>

                            <div class="product-content">
                                <p>{!! $getProduct->short_description!!} </p>
                            </div>
                            <form action="{{ url('product/add-to-cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $getProduct->id }}">
                            @if(!empty(($getProduct->getColor->count())))
                            <div class="details-filter-row details-row-size">
                                <label for="size">Color:</label>
                                <div class="select-custom">
                                    <select name="color_id" id="color_id" required class="form-control">
                                        <option value="" >Select a Color</option>
                                        @foreach ($getProduct->getColor as  $color)
                                        <option value="{{ $color->getColor->id }}">{{ $color->getColor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            </div>

                            @if(!empty(($getProduct->getSize->count())))
                            <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="size_id" id="size" required class="form-control getSizePrice">
                                        <option data-price ="0" value="" >Select a size</option>
                                        @foreach ($getProduct->getSize as  $size)
                                        <option data-price= "{{ !empty($size->price) ? $size->price : 0 }}" value="{{ $size->id }}">{{ $size->name }}@if(!empty($size->price)) (${{ number_format($size->price,2) }}) @endif</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            @endif

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="100" name="qty" required step="1" data-decimals="0" required>
                                </div>
                            </div>

                            <div class="product-details-action">
                                <button type="submit"  style="background: #fff;color:#c96;" class="btn-product btn-cart" >add to cart</button>
                                <div class="details-action-wrapper">
                                    @if(!empty(Auth::check()))
                                    <a href="javascript:;" id="{{ $getProduct->id }}" class="btn-product btn-wishlist add_to_wishlist add_to_wishlist{{ $getProduct->id}}
                                        {{(!empty($getProduct->checkWishlist($getProduct->id) )) ? 'btn-wishlist-add' : '' }}
                                        " title="Wishlist"><span>Add to Wishlist</span></a>
                                    @else
                                    <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                    @endif
                                </div>
                            </div>
                        </form>
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="{{ url($getProduct->getCategory->slug) }}">{{ $getProduct->getCategory->name }}</a> ,
                                    <a href="{{ url($getProduct->getCategory->slug . '/' . $getProduct->getSubCategory->slug ) }}">{{ $getProduct->getSubCategory->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="product-details-tab product-details-extended">
                <div class="container">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ({{$getProduct->getTotalReview() }})</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <div class="container" style="margin-top: 30px">
                                {!! $getProduct->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <div class="container"  style="margin-top: 30px">
                                {!! $getProduct->additional_information !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <div class="container"  style="margin-top: 30px">
                                {!! $getProduct->shipping_returns !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container">
                                <h3>Reviews ({{ $getProduct->getTotalReview() }})</h3>
                                @foreach ($getReviewProduct as $review )
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{ $review->name }}</a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: {{ $review->getStarPercent() }}%;"></div>
                                                    </div>
                                                </div>
                                                <span class="review-date">{{ Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</span>
                                            </div>
                                            <div class="col">
                                                <h4>{{ $review->review }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                    {!! $getReviewProduct->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                @foreach ($getRelatedProduct as $product)
                    @php
                        $getProductImage = $product->getSingleImage($product->id);
                    @endphp
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="{{ url($product->slug) }}">
                                @if (!empty($getProductImage) && !empty($getProductImage->getUploadedImage()))
                                        <img style="height:280px;width:100%;object-fit:cover;"
                                        src="{{ $getProductImage->getUploadedImage() }}"
                                        alt="{{ $product->title }}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">

                                @if(!empty(Auth::check()))
                                <a href="javascript:;" id="{{ $product->id }}" class="btn-product-icon btn-wishlist btn-expandable add_to_wishlist add_to_wishlist{{ $product->id}}
                                    {{(!empty($product->checkWishlist($product->id) )) ? 'btn-wishlist-add' : '' }}
                                    " title="Wishlist"><span>Add to Wishlist</span></a>

                                @else
                                <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" title="Wishlist"><span>Add to Wishlist</span></a>
                                @endif
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                    <a href="{{ url($product->category_slug . '/' . $product->sub_category_slug) }}">{{ $product->sub_category_name }}</a>
                            </div>
                            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div>
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->
                            <div class="product-nav product-nav-thumbs">
                                <a href="#" class="active">
                                    <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                </a>
                                <a href="#">
                                    <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                </a>

                                <a href="#">
                                    <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                </a>
                            </div><!-- End .product-nav -->


                        </div>
                    </div><!-- End .product-body -->
                    @endforeach
            </div><!-- End .product -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
@section('script')
<script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.elevateZoom.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
    <script>
    $('.getSizePrice').change(function(){
        //var product_price = '{{ $getProduct->price }}';
        var price = $('option:selected' , this).attr('data-price');
        var total =  parseFloat(price);//parseFloat(product_price) +
        $('#getTotalPrice').html(total.toFixed(2));
    });
        </script>

@endsection
