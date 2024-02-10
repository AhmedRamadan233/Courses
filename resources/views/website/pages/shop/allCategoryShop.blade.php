@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form  id="searchForm"  action="{{ route('shop.index') }}" method="GET">
                                <input type="text" name="searchInput" id="searchInput" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>All Main Categories</h3>
                            <ul class="list">
                                @foreach ($mainCategories as $category)
                                @if ($category->parent_id == null)
                                    <li>
                                        <a>{{$category->name}} </a>
                                        @foreach ($categories as $category)
                                            @if ($category->parent_id == null)
                                            <span>({{$category->count()}})</span>
                                            @endif
                                        @endforeach
                                    </li>                                   
                                @endif
                                @endforeach

                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget range">
                            <h3>Price Range</h3>
                            <input type="range" class="form-range" id="priceRangeInput" name="range" step="10" min="10" max="10000" value="0">
                            <div class="range-inner">
                                <label>$</label>
                                <input type="text" id="rangePrimary" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <!-- End Product Sidebar -->
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        
                                        <h3 class="total-show-product">
                                            Showing:
                                            <span>
                                                {{ $categories->firstItem() }} - {{ $categories->lastItem() }} items
                                            </span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-list" type="button" role="tab"
                                                aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row" id="addedToCart" >
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
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        {{ $categories->links('vendor.pagination.next-previous')}}
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach ($listCategories as $index=>$category )  
                                        @if ($category->parent_id !== null)
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <!-- Start Single Product -->
                                                <div class="single-product">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-4 col-md-4 col-12">
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
                                                        </div>
                                                        <div class="col-lg-8 col-md-8 col-12">
                                                            <div class="product-info">
                                                                <span class="category">{{$category->parent->name}}</span>
                                                                <h4 class="title">
                                                                    <a href="product-grids.html">{{$category->name}}</a>
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
                                                    </div>
                                                </div>
                                                <!-- End Single Product -->
                                            </div>
                                        @endif
                                    @endforeach
                                    
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            {{ $listCategories->links('vendor.pagination.numircal')}}
                                        </div>
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
@endsection
@push('webste.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>
    $(document).ready(function() {
        $('#priceRangeInput').on('input', function() {
            var value = $(this).val();
            updateRange(value);
        });
    });

    function applyPriceRangeScope(minPrice, maxPrice ) {
        minPrice = $('#priceRangeInput').val();

        console.log(minPrice + " -> " + maxPrice)
        $('#addedToCart').load('{{ route("shop.index") }}?min_price=' + minPrice + '&max_price=' + maxPrice + ' #addedToCart>*');
        $('#nav-list').load('{{ route("shop.index") }}?min_price=' + minPrice + '&max_price=' + maxPrice + ' #nav-list>*');
       
    }

    function updateRange(value) {
        $('#rangePrimary').val(value);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route("update-price-range") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: { value: value },
            success: function(response) {
                var minPrice = response.minPrice;
            var maxPrice = response.maxPrice;
            applyPriceRangeScope(minPrice, maxPrice);
                console.log('Price range updated successfully');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error('Error updating price range:', error);
            }
        });
    }

    $(document).ready(function() {
        $('#searchForm').on('submit', function(event) {
            event.preventDefault();
            var name = $('#searchInput').val();
            updateSearch(name);
        });
    });

    function applySearchWithName(name) {
        $('#addedToCart').load('{{ route("shop.index") }}?name=' + name + ' #addedToCart>*');
        $('#nav-list').load('{{ route("shop.index") }}?name=' + name +  ' #nav-list>*');

    }

    function updateSearch(name) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '{{ route("shop.index") }}',
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: { name: name },
            success: function(response) {
                applySearchWithName(name);
            },
            error: function(xhr, status, error) {
                console.error('Error searching products:', error);
            }
        });
    }


</script>

@endpush


