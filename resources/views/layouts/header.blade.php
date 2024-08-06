<header class="header">
    <div class="header-top">
        <div class="container">
            <!-- Start header-left -->
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">Usd</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End header-left -->

            <!-- Start header-right -->
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:{{ $getSystemSettingApp->phone }}"><i class="icon-phone"></i>Call: {{ $getSystemSettingApp->phone }}</a></li>
                            @if(!empty(Auth::check()))
                            <li><a href="{{ url('my-wishlist') }}"><i class="icon-heart-o"></i>My Wishlist</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal"><i class="icon-heart-o"></i>My Wishlist</a></li>
                            @endif
                            <li><a href="{{ url('about') }}">About Us</a></li>
                            <li><a href="{{ url('contact') }}">Contact Us</a></li>

                            @if(!empty(Auth::check()))
                            <li><a href="{{ url('user/dashboard')}}"><i class="icon-user "></i>{{Auth::user()->name }}</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ $getSystemSettingApp->getLogo()  }}" alt="Molla Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ url('/') }}" class="custom">Home</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Shop</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                @php
                                                    $getCategoryHeader = App\models\Category::getMenuRecord();
                                                    $i = 0;
                                                @endphp
                                                @foreach ($getCategoryHeader as $value_web_category)
                                                    <div class="col-md-6 mb-1">
                                                        <a href="{{ url($value_web_category->slug) }}"
                                                            class="menu-title my-custom">{{ $value_web_category->name }}</a>
                                                        <ul>
                                                            @foreach ($value_web_category->getSubCategory as $value_sub_category)
                                                                @if (!empty($value_web_category->getSubCategory->count()))
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                    @if( $value_web_category->name === 'Kids' && $i == 5)
                                                                        @php
                                                                            $i = 0;
                                                                        @endphp
                                                                        @break
                                                                    @endif
                                                                    @if ($i > 6)
                                                                        @php
                                                                            $i = 0;
                                                                        @endphp
                                                                        @break
                                                                    @endif
                                                                <li><a
                                                                        href="{{ url($value_web_category->slug . '/' . $value_sub_category->slug) }}">{{ $value_sub_category->name }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="banner banner-overlay">
                                        <a href="{{ url('category') }}" class="banner banner-menu">
                                            <img src="{{ url('assets/images/menu/banner-1.jpg') }}" alt="Banner">
                                            <div class="banner-content banner-content-top">
                                                <div class="banner-title text-white">Last
                                                    <br>Chance<br><span><strong>Sale</strong></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="header-right">
            <div class="header-search">
                <a href="#" class="search-toggle" role="button" title="Search"><i
                        class="icon-search"></i></a>
                <form action="{{ url('search') }}" method="get">
                    <div class="header-search-wrapper">
                        <label for="q" class="sr-only">Search</label>
                        <input type="search" class="form-control" name="q" id="q"
                            placeholder="Search in..." value="{{ !empty(Request::get('q'))  ? Request::get('q') : ''}}" required>
                    </div>
                </form>
            </div>

            <div class="dropdown cart-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-display="static">
                    <i class="icon-shopping-cart"></i>
                    <span class="cart-count">{{ \Cart::getContent()->count() }}</span>
                </a>
                @if(!empty(Cart::getContent()->count()))
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-cart-products">
                        @foreach (\Cart::getContent() as $header_cart )
                            @php
                                $getCartProudct = App\Models\Product::getSingle($header_cart->id);
                            @endphp
                                @if(!empty($getCartProudct))
                                    @php
                                        $getProductImage = $getCartProudct->getSingleImage($getCartProudct->id);
                                    @endphp
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="{{ url($getCartProudct->slug) }}">{{ $getCartProudct->title }}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $header_cart->quantity }}</span>
                                                ${{ number_format($header_cart->price , 2) }}
                                            </span>
                                        </div>

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{ $getProductImage->getUploadedImage() }}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="{{ url('cart/delete/'.$header_cart->id) }}" class="btn-remove" title="Remove Product"><i
                                                class="icon-close"></i></a>
                                    </div>
                                @endif
                        @endforeach
                    </div>

                    <div class="dropdown-cart-total">
                        <span>Total</span>

                        <span class="cart-total-price">{{ number_format(\Cart::getSubTotal() , 2) }}</span>
                    </div>

                    <div class="dropdown-cart-action">
                        <a href="{{ url('cart') }}" class="btn btn-primary">View Cart</a>
                        <a href="{{ url('checkout') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                class="icon-long-arrow-right"></i></a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</header>
