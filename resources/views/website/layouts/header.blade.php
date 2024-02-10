<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            @auth
                                @if(Auth::user()->role == 'super_admin')
                                <li class="btn btn-outline-light text-danger me-5 flex-grow-1">
                                    <a class="text-danger d-flex align-items-center" href="{{ route('dashboard') }}">
                                        <i class="lni lni-dashboard me-2" style="font-size: 24px;"></i>
                                        <span>Go to dashboard</span>
                                    </a>
                                </li>                                    
                                @endif
                            @endauth
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                           
                            <li><a href="{{route('coursesWebsite.index')}}">Home</a></li>
                            <li><a href="{{route('aboutus.index')}}">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        <div class="user">
                            <i class="lni lni-user"></i>
                            @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </div>
                        <ul class="user-login">
                            @auth
                                <li  class="btn flex-grow-1">
                                    <form action="{{ route('logout') }}" method="post" style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-danger" style="text-decoration: none;">
                                           <span>Logout</span> 
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">Sign In</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="index.html">
                        {{-- @foreach ($generalSettings->images as $image )
                                @if($image->type == 'logo')
                                    <img src="{{asset('logoImages/' . $image->src) }}" alt="{{ $image->type }}" width="auto" height="100px">
                                @endif
                        @endforeach --}}
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            {{-- <div class="search-select">
                                <div class="select-position">
                                    <select id="select1">
                                        <option selected>All</option>
                                        <option value="1">option 01</option>
                                        <option value="2">option 02</option>
                                        <option value="3">option 03</option>
                                        <option value="4">option 04</option>
                                        <option value="5">option 05</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>My Mobile:
                                <span>(02) {{$generalSettings->phone_number}}</span>
                            </h3>
                        </div>
                        <div class="navbar-cart" id="shopping-item">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            
                            @include('website.layouts.cartItem')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach ($mainCategories as $index=>$category )  
                                @if ($category->parent_id == null)
                                    <li><a>{{$category->name}} <i class="lni lni-chevron-right"></i></a>
                                        <ul class="inner-sub-category">
                                            @foreach ($mainCategories as $index=>$category )  
                                                @if ($category->parent_id !== null)
                                                    <li>
                                                        <a href="{{ route('category.getCategoryBySlug' ,['slug' => $category->slug] )}}">{{$category->name}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{route('coursesWebsite.index')}}" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item"><a href="{{route('shop.index')}}">Shop</a></li>
                                <li class="nav-item"><a href="{{route('MyCourse.index')}}">My Courses</a></li>
                                <li class="nav-item"><a href="{{route('aboutus.index')}}">About Us</a></li>
                         
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                          
                        <li>
                            <a href="{{$generalSettings->facebook_link}}"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="{{$generalSettings->github_link}}"><i class="lni lni-github-original"></i></a>
                        </li>
                        <li>
                            <a href="{{$generalSettings->linkedin_link}}"><i class="lni lni-linkedin-original"></i></a>
                        </li>
                        <li>
                            <a href="mailto:{{$generalSettings->gmail_link}}"><i class="lni lni-envelope"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>