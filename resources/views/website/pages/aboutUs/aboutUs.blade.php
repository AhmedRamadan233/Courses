@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!--====== Checkout Form Steps Part Start ======-->

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    
</script> 
@endpush 




