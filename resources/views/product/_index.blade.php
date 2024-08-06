<div class="products mb-3">
    <div class="row justify-content-center">

        @foreach ($getProducts as $product)
            @php
                $getProductImage = $product->getSingleImage($product->id);
            @endphp
            <div class="col-12 @if(!empty($is_home)) col-md-3 col-lg-3 @else col-md-4 col-lg-4 @endif">
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
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            <a
                                href="{{ url($product->category_slug . '/' . $product->sub_category_slug) }}">{{ $product->sub_category_name }}</a>
                        </div>
                        <h3 class="product-title"><a
                                href="{{ url($product->slug) }}">{{ $product->title }}</a>
                        </h3>
                        <div class="product-price">
                            ${{ number_format($product->price, 2) }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width:{{ $product->getReviewRating($product->id) }}%;"></div>
                            </div>
                            <span class="ratings-text">( {{ $product->getTotalReview() }} Reviews )</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
