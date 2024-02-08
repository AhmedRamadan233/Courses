@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h5 class="title">All Payments</h5>
                                <section class="checkout-steps-form-content p-3 ">
                                    
                                    <div class="row p-3"> 
                                        @foreach ($allPayments as $payment)
                                        <form class="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                        
                                        <button class="col-3 m-3 d-flex align-items-center justify-content-center border shadow btn"  type="submit">
                                            <div class="p-3">
                                                <div class="single-form form-default text-center">
                                                    <div class="form-input form">
                                                        @foreach ($payment->images as $image)
                                                        @if ($image->type == 'logoOfPayment')
                                                        <img src="{{asset('logoImages/' . $image->src) }}" alt="{{ $image->type }}" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    <h6 class="mt-3">{{$payment->name}}</h6>
                                                </div>
                                            </div>
                                        </button>
                                    </form>
                                        @endforeach
                                    </div>
                                    <div class="col-12 m-3 d-flex align-items-center justify-content-center">
                                        <p>Go to payment</p>
                                    </div>                        
                                </section>
                            </li>
                            
                            
                            {{-- <li>
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
                            </li> --}}
                        </ul>
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="cart-list-head mt-3">
                            <!-- Cart List Title -->
                            <div class="cart-list-title">
                                <div class="row">
                                    
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <p>Id</p>
                                    </div>
                                    
                                    <div class="col-lg-5 col-md-2 col-12">
                                        <p>Product Name</p>
                                    </div>
                                    <div class="col-lg-5 col-md-2 col-12">
                                        <p>Price</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Cart List Title -->
                            <!-- Cart Single List list -->
                            <div id="checkoutCartList">
                            @foreach ( $items as $index => $item )
                                <div class="cart-single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p> {{ $loop->iteration }}</p>
                                        </div>
                                    
                                        <div class="col-lg-5 col-md-3 col-12">
                                            <h5 class="product-name"><a href="product-details.html">
                                                    {{$item->category->name}}</a></h5>
                                            <p class="product-des">
                                                <span><em>Main Category:</em>{{$item->category->parent->name}}</span>
                                            </p>
                                        </div>
                                        
                                        <div class="col-lg-5 col-md-2 col-12">
                                            <p> {{$item->category->price}}</p>
                                        </div>
            
                                       
                                        
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <!-- End Single List list -->
                        </div>

                        <div class="checkout-sidebar-price-table mt-30 p-3" id="checkoutOrder">
                            <h5 class="title">Pricing Table</h5>


                            <div class="sub-total-price">
                               
                                
                                <div class="total-price discount">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">${{$total}}</p>
                                </div>

                                <div class="total-price">
                                    <p class="value">Coupon:</p>
                                    <p class="price">$0</p>
                                </div>
                            </div>
                            <div class="total-payable" >
                                <div class="payable-price">
                                    <p class="value">Total Price:</p>
                                    <p class="price">${{$total}}</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                
                    
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
@endsection
@push('webste.scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    
</script> 
@endpush 




