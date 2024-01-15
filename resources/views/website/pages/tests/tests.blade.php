@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane show active fade" id="nav-list" role="tabpanel"
                                aria-labelledby="nav-list-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <form id="quizForm">
                                                        <div class="product-info ">
                                                            <div class="single-widget product-sidebar p-2">
                                                                <h3 class="font-weight-bold border border-primary p-2 text-dark" style="border-radius: 8px;">What is the capital of France?</h3>
                                                            </div>
                                                            
                                                            
                                                            <ul class="options p-2">
                                                                <li class="m-3">
                                                                    <input class="form-check-input" type="radio" name="quizOption" id="option1" value="Berlin">
                                                                    <label class="form-check-label font-weight-bold" for="option1">Berlin</label>
                                                                </li>
                                                                <li class="m-3">
                                                                    <input class="form-check-input" type="radio" name="quizOption" id="option1" value="Berlin">
                                                                    <label class="form-check-label font-weight-bold" for="option1">Berlin</label>
                                                                </li>
                                                                <li class="m-3">
                                                                    <input class="form-check-input" type="radio" name="quizOption" id="option1" value="Berlin">
                                                                    <label class="form-check-label font-weight-bold" for="option1">Berlin</label>
                                                                </li>
                                                                <li class="m-3">
                                                                    <input class="form-check-input" type="radio" name="quizOption" id="option1" value="Berlin">
                                                                    <label class="form-check-label font-weight-bold" for="option1">Berlin</label>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-outline-info flex-grow-1 w-100" style="border-width: 8px; font-size: 24px;">
                                                                FINISHED
                                                            </button>
                                                                                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>     
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li><a href="javascript:void(0)">1</a></li>
                                                <li class="active"><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)">
                                                    <i class="lni lni-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Student Informattion</h3>
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="{{ asset('assets/images/products/product-1.jpg')}}" alt="#">
                                    
                                    <div class="button">
                                        {{-- <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>Go To Quiz</a> --}}
                                    </div>
                                </div>
                                <div class="product-info">
                                   
                                    <span class="category">first quiz</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">ahmed ramadan </a>
                                    </h4>
                                    
                                    <div class="price">
                                        {{-- <span>{{$quiz->price}}</span> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>All Questions</h3>
                            <ul class="list d-flex flex-wrap justify-content-between align-items-center">
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">1</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">2</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">3</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">4</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">5</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">6</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">7</a>
                                </li>
                                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                    <a href="product-grids.html">8</a>
                                </li>


                            </ul>
                        </div>
                        <!-- End Single Widget -->


                    </div>
                    <!-- End Product Sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
@endsection
@push('webste.scripts')
<script>
$(document).ready(function () {
    $(".next-button").on("click", function () {
        
        alert("Next button clicked for form with ID:");
    });
});

</script>
@endpush


<div class="row">
    {{-- @foreach ($solutions as $solution) --}}
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
    {{-- @endforeach --}}
</div>