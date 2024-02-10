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
                            @foreach ($slideShow->images as $image )
                            @if($image->type == 'slideShow')
                            <div class="single-slider" style="background-image: url('{{ asset("slideShowImages/{$slideShow->images->first()->src}") }}');">
                                @if ($slideShow->title !== null)
                                <div class="content bg-light">
                                    <h2 class="text-secondary"><span></span>{{ $slideShow->title }}</h2>
                                    <p class="text-secondary">{{ $slideShow->description }}</p>
                                </div>
                                @endif
                                
                            </div>
                            @endif
                            @endforeach
                        @endforeach
                    </div>
                    
                    <!-- End Hero Slider -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row">
                    @foreach ($slideShows as $slideShow)
                    @foreach ($slideShow->images as $image )
                    @if($image->type == 'Pressent')
                    <div class="col-lg-12 col-md-6 col-12 md-custom-padding mb-3">
                        <!-- Start Small Banner -->
                       
                        <div class="hero-small-banner" style="background-image: url('{{ asset("slideShowImages/{$slideShow->images->first()->src}") }}'); background-size: cover;">
                            <div class="content">
                                <h2>
                                    {{$slideShow->title}}
                                </h2>
                                <h3>{{ $slideShow->price }}</h3>
                            </div>
                        </div>
                      
                        <!-- End Small Banner -->
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                    
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
                    <h2>Displaying Only the Newest 4 Categories</h2>
                    {{-- <div >
                        <a class="btn btn-outline-primary text-dark m-1">ALL</a>
                        @foreach ($categories as $category)
                        @if ($category->parent_id == null)
                        <a class="btn btn-outline-primary text-dark m-1">{{ $category->name }}</a>
                        @endif
                        @endforeach
                    </div> --}}
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
                                @if (in_array($category->id, $isBoughtCategories))

                                    @if ($category->inCart)
                                        <div class="button">
                                            <a href="#" class="btn disabled">
                                                <i class="lni lni-checkmark-circle"></i> Already in cart
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    @if ($category->inCart)
                                        <div class="button">
                                            <a href="#" class="btn disabled">
                                                <i class="lni lni-checkmark-circle"></i> Already in cart
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
                                @endif
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

        <div class="section-title pt-5">
            <div >
                <a href="{{route('shop.index')}}" class="btn btn-outline-primary text-dark ">
                    Get ALL Category Shop
                </a>
               
            </div>
        </div>
        

    </div>
</section>
<!-- End Trending Product Area -->

<!-- Start Call Action Area -->
    <!-- Start About Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        @foreach ($generalSettings as $generalSettings)
                            @foreach ($generalSettings->images as $image )
                                @if($image->type == 'logoPic')
                                    <img src="{{asset('logoImages/' . $image->src) }}" alt="{{ $image->type }}" width="auto" height="700">
                                @endif
                            @endforeach
                        @endforeach
                        {{-- <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM"
                            class="glightbox video"><i class="lni lni-play"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right">
                        <h2>{{$generalSettings->user->name}}</h2>
                        <p>
                            {{$generalSettings->descriptions}}
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->
<!-- End Call Action Area -->

<!-- Start Banner Area -->
<section class="banner section">
    <div class="container">
        <div class="row">
            {{-- <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner" style="background-image:url('assets/images/banner/banner-1-bg.jpg')">
                    <div class="content">
                        <h2>Smart Watch 2.0</h2>
                        <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                        <div class="button">
                            <a href="product-grids.html" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-6 col-md-6 col-12">                                                      
                <div class="single-banner custom-responsive-margin">
                    <div class="content">
                        <div class="d-flex align-items-center justify-content-center">
                            <h2>They Said About Us</h2>   
                           </div>     
                        <div class="comments-logo-carousel d-flex align-items-center justify-content-center">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                        @foreach ($comments as $index => $comment)
                                            <div class="carousel-item {{$index == 0 ? 'active' : ''}}">
                                                <div class="single-blog">
                                                    <div class="blog-content">
                                                        <div class="single-product" >
                        
                                                            <div class="btn btn-primary col-lg-12 col-md-12 col-12">
                                                                <a href="#" class="btn">
                                                                   
                                                                    <span class="text-light"> <i class="lni lni-user text-light"></i>  {{$comment->user->name}}</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                            
                                                                <p class="title">
                                                                    {{$comment->comment}}
                                                                </p>
                                                                
                                                                {{-- <div class="price">
                                                                    <span> {{$comment->created_at}} </span>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
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
            <li>
                <div class="media-icon">
                    <a href="{{$generalSettings->github_link}}">
                        <i class="lni lni-github-original"></i>
                    </a>
                </div>
                <div class="media-body">
                    <h5>Github</h5>
                </div>
            </li>
            <!-- Repeat similar code for other links -->
           
            <!-- Money Return -->
            <!-- Support 24/7 -->
            <li>
                <div class="media-icon">
                    <a href="{{$generalSettings->whatsapp_link}}">
                        <i class="lni lni-whatsapp"></i>
                    </a>
                </div>
                <div class="media-body">
                    <h5>WhatsApp</h5>
                </div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-icon">
                    <a href="{{$generalSettings->linkedin_link	}}">
                        <i class="lni lni-linkedin-original"></i>
                    </a>
                </div>
                <div class="media-body">
                    <h5>Linked in</h5>
                </div>
            </li>
            <li>
                <div class="media-icon">
                    <a href="{{$generalSettings->gmail_link}}">
                        <i class="lni lni-envelope"></i>
                    </a>
                </div>
                <div class="media-body">
                    <h5>Gmail</h5>
                </div>
            </li>
        </ul>
        
    </div>
</section>
<!-- End Shipping Info -->
@endsection

@push('webste.scripts')
<script>


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


