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
                        @foreach ($slideShows as $slideShow)
                            <div class="single-slider" style="background-image: url('{{ asset("slideShowImages/{$slideShow->images->first()->src}") }}');">
                                <div class="content">
                                    <h2><span>No restocking fee (${{ $slideShow->price }})</span>{{ $slideShow->title }}</h2>
                                    <p>{{ $slideShow->description }}</p>
                                    <h3><span>Now Only</span> ${{ $slideShow->price }}</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
        <div class="row" id="addedToCart">
            @foreach ($categories as $index=>$category )  
                @if ($category->parent_id !== null)             
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <video 
                                    style="width: 300px; height: auto;" 
                                    id="video_{{ $category->id }}" 
                                    class="embed-responsive-item" 
                                    controls
                                >
                                    <source src="{{ asset('upload/' . $category->video) }}" type="video/mp4">
                                </video>
                                @if ($category->inCart)
                                    <div class="button">
                                        <a href="#" class="btn disabled">
                                            <i class="lni lni-checkmark-circle"></i> Aready in cart
                                        </a>
                                    </div>
                                @else
                                    <div class="button">
                                        <form class="addToCartForm" id="addToCartForm_{{ $index }}" method="post" action="{{ route('cart.store') }}" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                                            <button id="addToCartButton" type="button" class="btn" onclick="addToCart('{{ $index }}', '{{ $category->id }}')">
                                                <i class="lni lni-cart"></i> Add to Cart
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            
                                {{-- <div class="button">
                                    <form class="addToCartForm" id="addToCartForm_{{ $index }}" method="post" action="{{ route('cart.store') }}" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                                        <button id="addToCartButton" type="button" class="btn" onclick="addToCart('{{ $index }}', '{{ $category->id }}')">
                                            <i class="lni lni-cart"></i> Add to Cart
                                        </button>
                                    </form>
                                    
                                </div> --}}
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

@push('webste.scripts')
<script>
// function addToCart(index, categoryId) {
//     var form = $('#addToCartForm_' + index);
//     $.ajax({
//         type: form.attr('method'),
//         url: form.attr('action'),
//         data: form.serialize(),
//         success: function (response) {
//             $('#shopping-item').load(location.href + ' #shopping-item>*', '');

//             // console.log(categoryId + ' added to cart successfully.');
//         },
//         error: function (error) {
//             console.log('Error adding ' + categoryId + ' to cart.');
//         }
//     });
// }

function addToCart(index, categoryId) {
    var form = $('#addToCartForm_' + index);
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {
            disableAddCartButton();
            $('#shopping-item').load(location.href + ' #shopping-item>*', '');
            $('#addedToCart').load(location.href + ' #addedToCart>*', '');
            Swal.fire({
                icon: 'success',
                title: 'Added to Cart!',
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function (error) {
            console.log('Error adding ' + categoryId + ' to cart.');

            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred while adding to the cart.'
            });
        }
    });
}

function disableAddCartButton() {
    $('#addToCartButton').prop('disabled', true);
}
</script>
@endpush


