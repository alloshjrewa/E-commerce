@extends('layouts.app')
@section('content')
    <main class="main">
        <div class="intro-section bg-lighter pt-5 pb-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div style="margin-top: 15px" class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div  class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                                data-toggle="owl"
                                data-owl-options='{
                                "nav": false,
                                "responsive": {
                                    "768": {
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($getSlider as $slider )
                            @if(!empty( $slider->getImage()))
                                    <div class="intro-slide"style="height:500px" >
                                        <figure class="slide-image"  >
                                            <picture >
                                                <source media="(max-width: 480px)"
                                                    srcset="{{ $slider->getImage() }}">
                                                <img src="{{ $slider->getImage() }}"   alt="Image Desc">
                                            </picture>
                                        </figure>

                                        <div class="intro-content">
                                            <h1 class="intro-title">{!! $slider->title !!}</h1>
                                            @if(!empty( $slider->button_link) && !empty( $slider->button_name))
                                            <a href="{{ $slider->button_link }}" class="btn btn-outline-white">
                                                <span>{{ $slider->button_name }}</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                            <span class="slider-loader"></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="intro-banners">
                            <div class="row row-sm">
                                <div class="col-md-6 col-lg-12">
                                    <div class="banner banner-display">
                                        <a href="#">
                                            <img src="{{ url('assets/images/sport.jpeg') }}" style="height:275px" alt="Banner">
                                        </a>

                                        <div class="banner-content">

                                            <a href="#" class="btn btn-outline-white banner-link">Shop
                                                Now<i class="icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12">
                                    <div class="banner banner-display mb-0">
                                        <a href="#">
                                            <img src="{{ url('assets/images/slipper.jpeg') }}" style="height:230px" alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-darkwhite"><a href="#">New
                                                    in</a></h4><!-- End .banner-subtitle -->
                                            <h3 class="banner-title text-white"><a href="#">Best
                                                    Lighting <br>Collection</a></h3>
                                            <a href="#" class="btn btn-outline-white banner-link">Discover Now<i
                                                    class="icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div><!-- End .col-md-6 col-lg-12 -->
                            </div><!-- End .row row-sm -->
                        </div><!-- End .intro-banners -->
                    </div><!-- End .col-lg-4 -->
                </div>

                <div class="mb-10"></div>
                @if(!empty($getPartner->count()))
                <div class="owl-carousel owl-simple" data-toggle="owl"
                    data-owl-options='{
                    "nav": false,
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        }
                    }
                }'>
                        @foreach ($getPartner as $partner )
                        <a href="{{ !empty($partner->link) ? $partner->link : '#' }}" class="brand">
                            <img src="{{ $partner->getImage() }}" alt="Brand Name">
                        </a>
                    @endforeach

                </div>
                @endif

                </div><!-- End .owl-carousel -->
            </div>
        </div><!-- End .bg-lighter -->


        <div class="container categories pt-6">
            <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->

            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="banner banner-display banner-link-anim">
                        <a href="{{ url('/men-shoes') }}">
                            <img src="{{ url('assets/images/banner/men.jpeg') }}" style="height:100%" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Men</a></h3>

                            <a href="{{ url('/men-shoes') }}" class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 order-lg-last">
                    <div class="banner banner-display banner-link-anim">
                        <a href="{{ url('/women-shoes') }}">
                            <img src="{{ url('assets/images/banner/women.jpeg') }}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Women</a></h3>

                            <a href="{{ url('/women-shoes') }}" class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 banners-sm">
                    <div class="row">
                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="{{ url('/kids-shoes') }}">
                                <img src="{{ url('assets/images/banner/kids.jpeg') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Kids</a>
                                </h3>
                                <a href="{{ url('/kids-shoes') }}" class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5"></div>

        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                            <p>Free shipping for orders over $50</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                            <p>Free 100% money back guarantee</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                            <p>Alway online feedback 24/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div>

            <div class="mb-2"></div><!-- End .mb-2 -->
        </div>
        <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
            <div class="container">
                <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2>
                <!-- End .title-lg text-center -->

                <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "items": 3,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "600": {
                            "items":2
                        },
                        "992": {
                            "items":3
                        }
                    }
                }'>
                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="assets/images/blog/home/post-1.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Nov 22, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Sed adipiscing ornare.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit.<br>Pelletesque aliquet nibh necurna. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="assets/images/blog/home/post-2.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 12, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Fusce lacinia arcuet nulla.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales
                                    leo, eget blandit nunc tortor eu nibh. Nullam mollis justo. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="assets/images/blog/home/post-3.jpg" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 19, 2018</a>, 2 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="single.html">Quisque volutpat mattis eros.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede
                                    semper est, vitae luctus metus libero eu augue. </p>
                                <a href="single.html" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .owl-carousel -->
            </div><!-- container -->

            <div class="more-container text-center mb-0 mt-3">
                <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more
                        articles</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div>
        <div class="cta cta-display bg-image pt-4 pb-4"
            style="background-image: url(assets/images/backgrounds/cta/bg-6.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3>
                                <!-- End .cta-title -->
                                <p class="cta-desc text-white">Molla presents the best in interior design</p>
                                <!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div>
            </div>
        </div><!-- End .cta -->
    </main><!-- End .main -->
@endsection
