@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')

<div class="col-lg-12 col-md-6">
    <div class="checkout-steps-form-style-1">
        <ul id="accordionExample">
            <li>
                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-form form-default">
                                <label>User Name</label>
                                <div class="row">
                                    <div class="col-md-6 form-input form">
                                        <input type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 form-input form">
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Email Address</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Phone Number</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-form form-default">
                                <label>Mailing Address</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Mailing Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>City</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Post Code</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Post Code">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Country</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Country">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Region/State</label>
                                <div class="select-items">
                                    <select class="form-control">
                                        <option value="0">select</option>
                                        <option value="1">select option 01</option>
                                        <option value="2">select option 02</option>
                                        <option value="3">select option 03</option>
                                        <option value="4">select option 04</option>
                                        <option value="5">select option 05</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-checkbox checkbox-style-3">
                                <input type="checkbox" id="checkbox-3">
                                <label for="checkbox-3"><span></span></label>
                                <p>My delivery and mailing addresses are the same.</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-form button">
                                <button class="btn" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">next
                                    step</button>
                            </div>
                        </div>
                    </div>
                </section>
            </li>
            <li>
                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                    aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                <section class="checkout-steps-form-content collapse" id="collapseFour"
                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-form form-default">
                                <label>User Name</label>
                                <div class="row">
                                    <div class="col-md-6 form-input form">
                                        <input type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 form-input form">
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Email Address</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Phone Number</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-form form-default">
                                <label>Mailing Address</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Mailing Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>City</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Post Code</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Post Code">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Country</label>
                                <div class="form-input form">
                                    <input type="text" placeholder="Country">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Region/State</label>
                                <div class="select-items">
                                    <select class="form-control">
                                        <option value="0">select</option>
                                        <option value="1">select option 01</option>
                                        <option value="2">select option 02</option>
                                        <option value="3">select option 03</option>
                                        <option value="4">select option 04</option>
                                        <option value="5">select option 05</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-payment-option">
                                <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                    Option</h6>
                                <div class="payment-option-wrapper">
                                    <div class="single-payment-option">
                                        <input type="radio" name="shipping" checked id="shipping-1">
                                        <label for="shipping-1">
                                            <img src="https://via.placeholder.com/60x32"
                                                alt="Sipping">
                                            <p>Standerd Shipping</p>
                                            <span class="price">$10.50</span>
                                        </label>
                                    </div>
                                    <div class="single-payment-option">
                                        <input type="radio" name="shipping" id="shipping-2">
                                        <label for="shipping-2">
                                            <img src="https://via.placeholder.com/60x32"
                                                alt="Sipping">
                                            <p>Standerd Shipping</p>
                                            <span class="price">$10.50</span>
                                        </label>
                                    </div>
                                    <div class="single-payment-option">
                                        <input type="radio" name="shipping" id="shipping-3">
                                        <label for="shipping-3">
                                            <img src="https://via.placeholder.com/60x32"
                                                alt="Sipping">
                                            <p>Standerd Shipping</p>
                                            <span class="price">$10.50</span>
                                        </label>
                                    </div>
                                    <div class="single-payment-option">
                                        <input type="radio" name="shipping" id="shipping-4">
                                        <label for="shipping-4">
                                            <img src="https://via.placeholder.com/60x32"
                                                alt="Sipping">
                                            <p>Standerd Shipping</p>
                                            <span class="price">$10.50</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="steps-form-btn button">
                                <button class="btn" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">previous</button>
                                <a href="javascript:void(0)" class="btn btn-alt">Save & Continue</a>
                            </div>
                        </div>
                    </div>
                </section>
            </li>
            <li>
                <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                    aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                <section class="checkout-steps-form-content collapse" id="collapsefive"
                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="row">
                        <div class="col-12">
                            <div class="checkout-payment-form">
                                <div class="single-form form-default">
                                    <label>Cardholder Name</label>
                                    <div class="form-input form">
                                        <input type="text" placeholder="Cardholder Name">
                                    </div>
                                </div>
                                <div class="single-form form-default">
                                    <label>Card Number</label>
                                    <div class="form-input form">
                                        <input id="credit-input" type="text"
                                            placeholder="0000 0000 0000 0000">
                                        <img src="assets/images/payment/card.png" alt="card">
                                    </div>
                                </div>
                                <div class="payment-card-info">
                                    <div class="single-form form-default mm-yy">
                                        <label>Expiration</label>
                                        <div class="expiration d-flex">
                                            <div class="form-input form">
                                                <input type="text" placeholder="MM">
                                            </div>
                                            <div class="form-input form">
                                                <input type="text" placeholder="YYYY">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-form form-default">
                                        <label>CVC/CVV <span><i
                                                    class="mdi mdi-alert-circle"></i></span></label>
                                        <div class="form-input form">
                                            <input type="text" placeholder="***">
                                        </div>
                                    </div>
                                </div>
                                <div class="single-form form-default button">
                                    <button class="btn">pay now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </li>
        </ul>
    </div>
</div>
<div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Question 1</h5>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer" id="answer1" value="option1">
          <label class="form-check-label" for="answer1">
            Option 1
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer" id="answer2" value="option2">
          <label class="form-check-label" for="answer2">
            Option 2
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer" id="answer3" value="option3">
          <label class="form-check-label" for="answer3">
            Option 3
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="answer" id="answer4" value="option4">
          <label class="form-check-label" for="answer4">
            Option 4
          </label>
        </div>
        <button type="button" class="btn btn-primary mt-3">Previous</button>
        <button type="button" class="btn btn-primary mt-3 ms-2">Next</button>
      </div>
    </div>
  </div>
  
  































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
               
          

  {{-- Retrieve the cookie data from the request --}}
  @php
  $cookieData = json_decode(request()->cookie('solutions_cookie'), true);
@endphp



{{-- Or, if you want to display the entire array for debugging purposes --}}
<pre>{{ print_r($cookieData, true) }}</pre>

     
            </div>
            <!-- End Single Product -->
        </div>
    {{-- @endforeach --}}
</div>