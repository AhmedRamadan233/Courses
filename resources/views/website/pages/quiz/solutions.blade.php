@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')

<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
    <div class="container">
        {{-- <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{ $quiz->section->name }}</h2>
                    <div >
                        @foreach ($quizzes as $quiz)
                        <a class="btn btn-outline-primary text-dark m-1">{{ $quiz->section->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            @foreach ($solutions as $solution)
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="{{ asset('assets/images/products/product-1.jpg')}}" alt="#">
                            
                            <div class="button">
                                {{-- <a href="{{ route('quizWebsite.getQuizById', ['id' => $quiz->id]) }}" class="btn">
                                    <i class="lni lni-cart"></i> Go To Quiz
                                </a> --}}
                            </div>
                        </div>
                        <div class="product-info">
 
                            <h4 class="title">
                                <a href="product-grids.html">{{$solution->user->name}}</a>
                            </h4>
                            <h4 class="title">
                                <a href="product-grids.html">{{$solution->quiz->name}}</a>
                            </h4>
                          
                            <h4 class="title">
                                <a href="product-grids.html">{{$solution->question->body}}</a>
                            </h4> 
                            <h4 class="title">
                                <a href="product-grids.html">{{$solution->answer->answer}}</a>
                            </h4>
                            @if($solution->answer->is_correct)
                                <p class="btn disabled btn-success">True</p>
                            @else
                                <p class="btn disabled btn-warning">FALSE</p>
                            @endif
                            <h4 class="title">
                                <a href="product-grids.html">{{$solution->true_answer}}</a>
                            </h4>
                           
                            {{-- <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul> --}}
                            <div class="price">
                                {{-- <span>{{$quiz->price}}</span> --}}
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            @endforeach
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



