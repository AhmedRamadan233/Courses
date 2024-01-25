@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
  <!-- Start Hero Area -->
  <section class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 custom-padding-right">
                <div class="slider-head">
                    <!-- Start Hero Slider -->
                    <div class="hero-slider">
                        <!-- Start Single Slider -->
                        <div class="single-slider"
                            style="background-image: url({{ asset('assets/images/hero/slider-bg1.jpg')}});">
                            <div class="content">
                                <h2><span>No restocking fee ($35 savings)</span>
                                    M75 Sport Watch
                                </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <h3><span>Now Only</span> $320.99</h3>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slider -->
                        <!-- Start Single Slider -->
                        <div class="single-slider"
                            style="background-image: url({{ asset('assets/images/hero/slider-bg2.jpg')}});">
                            <div class="content">
                                <h2><span>Big Sale Offer</span>
                                    Get the Best Deal on CCTV Camera
                                </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <h3><span>Combo Only:</span> $590.00</h3>
                                <div class="button">
                                    <a href="product-grids.html" class="btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slider -->
                    </div>
                    <!-- End Hero Slider -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner"
                            style="background-image: url({{ asset('assets/images/hero/slider-bnr.jpg')}});">
                            <div class="content">
                                <h2>
                                    <span>New line required</span>
                                    iPhone 12 Pro Max
                                </h2>
                                <h3>$259.99</h3>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner style2">
                            <div class="content">
                                <h2>Weekly Sale!</h2>
                                <p>Saving up to 50% off all online store items this week.</p>
                                <div class="button">
                                    <a class="btn" href="product-grids.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Start Small Banner -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Product</h2>
                    <div >
                        <a class="btn btn-outline-primary text-dark m-1">ALL</a>
                        @foreach ($categories as $category)
                        @if ($category->parent_id == null)
                        <a class="btn btn-outline-primary text-dark m-1">{{ $category->name }}</a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category )  
            @if ($category->parent_id !== null)             
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
   
                        <video 
                            style="width: 300px; height: auto;" 
                            id="video" 
                            class="embed-responsive-item" 
                            controls
                        >
                            <source src="{{ asset('upload/' . $category->video) }}" type="video/mp4">
                        </video>
                        <div class="button">
                            <form method="post" action="{{ route('cart.store') }}" style="display:inline;">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <button type="submit" class="btn">
                                    <i class="lni lni-cart"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                        
                    </div>
                    <div class="product-info">
                        <span class="category">{{$category->parent->name}}</span>
                        <h4 class="title">
                            <a href="{{ route('category.getCategoryBySlug' ,['slug' => $category->slug] )}}">{{$category->name}}</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>{{$category->price}}</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            @endif
            @endforeach
            {{-- <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/products/product-2.jpg')}}" alt="#">
                        <span class="sale-tag">-25%</span>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Speaker</span>
                        <h4 class="title">
                            <a href="product-grids.html">Big Power Sound Speaker</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$275.00</span>
                            <span class="discount-price">$300.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/products/product-3.jpg')}}" alt="#">
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Camera</span>
                        <h4 class="title">
                            <a href="product-grids.html">WiFi Security Camera</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$399.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="{{ asset('assets/images/products/product-4.jpg')}}" alt="#">
                        <span class="new-tag">New</span>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Phones</span>
                        <h4 class="title">
                            <a href="product-grids.html">iphone 6x plus</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$400.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="assets/images/products/product-5.jpg" alt="#">
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Headphones</span>
                        <h4 class="title">
                            <a href="product-grids.html">Wireless Headphones</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$350.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="assets/images/products/product-6.jpg" alt="#">
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Speaker</span>
                        <h4 class="title">
                            <a href="product-grids.html">Mini Bluetooth Speaker</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$70.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="assets/images/products/product-7.jpg" alt="#">
                        <span class="sale-tag">-50%</span>
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Headphones</span>
                        <h4 class="title">
                            <a href="product-grids.html">PX7 Wireless Headphones</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><span>4.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$100.00</span>
                            <span class="discount-price">$200.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="assets/images/products/product-8.jpg" alt="#">
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Laptop</span>
                        <h4 class="title">
                            <a href="product-grids.html">Apple MacBook Air</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>$899.00</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div> --}}
        </div>
    </div>
</section>
<!-- End Trending Product Area -->

<!-- Start Call Action Area -->
<section class="call-action section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="inner">
                    <div class="content">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free<br>
                            Lite version of ShopGrids</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Please, purchase full version of the template
                            to get all pages,<br> features and commercial license.</p>
                        <div class="button wow fadeInUp" data-wow-delay=".8s">
                            <a href="javascript:void(0)" class="btn">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Call Action Area -->

<!-- Start Banner Area -->
<section class="banner section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner" style="background-image:url('assets/images/banner/banner-1-bg.jpg')">
                    <div class="content">
                        <h2>Smart Watch 2.0</h2>
                        <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner custom-responsive-margin"
                    style="background-image:url('assets/images/banner/banner-2-bg.jpg')">
                    <div class="content">
                        <h2>Smart Headphone</h2>
                        <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                            incididunt ut labore.</p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Shipping Info -->
<section class="shipping-info">
    <div class="container">
        <ul>
            <!-- Free Shipping -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="media-body">
                    <h5>Free Shipping</h5>
                    <span>On order over $99</span>
                </div>
            </li>
            <!-- Money Return -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="media-body">
                    <h5>24/7 Support.</h5>
                    <span>Live Chat Or Call.</span>
                </div>
            </li>
            <!-- Support 24/7 -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="media-body">
                    <h5>Online Payment.</h5>
                    <span>Secure Payment Services.</span>
                </div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="media-body">
                    <h5>Easy Return.</h5>
                    <span>Hassle Free Shopping.</span>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- End Shipping Info -->
@endsection



