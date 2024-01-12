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
                            <div class="tab-pane show active fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                @foreach ($questions as $question)
                                                    <div class="col-lg-12 col-md-12 col-12">
                                                        <form id="quizForm">
                                                            <div class="product-info">
                                                                <div class="single-widget product-sidebar p-2">
                                                                    <h3 class="font-weight-bold p-2 text-primary" style="border-radius: 8px;">{{ $question->body }}</h3>
                                                                </div>
                            
                                                                <ul class="options p-2">
                                                                    @foreach ($question->answers as $answer)
                                                                        <li class="m-3">
                                                                            <input class="form-check-input" type="radio" name="quizOption" id="option{{ $loop->parent->index + 1 }}{{ $loop->index + 1 }}" value="{{ $answer->answer }}">
                                                                            <label class="form-check-label font-weight-bold" for="option{{ $loop->parent->index + 1 }}{{ $loop->index + 1 }}">{{ $answer->answer }}</label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                            
                                                            <div class="p-2">
                                                                <button class="btn btn-outline-primary flex-grow-1 w-100" style="border-radius: 8px;font-size: 24px;">
                                                                    FINISHED
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                    </div>
                                    {{ $questions->links('vendor.pagination.next-previous')}}

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
                            {{ $questions->links('vendor.pagination.numircal')}}

                            {{-- <ul class="list d-flex flex-wrap justify-content-between align-items-center">
                               
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


                            </ul> --}}
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


