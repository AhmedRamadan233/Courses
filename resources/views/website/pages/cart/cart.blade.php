@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        {{-- <div class="col-lg-2 col-md-2 col-12">
                            <p>Discount</p>
                        </div> --}}
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                <!-- Cart Single List list -->
                @foreach ( $items as $item )
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html"><img src="https://via.placeholder.com/220x200" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="product-details.html">
                                        {{$item->category->name}}</a></h5>
                                <p class="product-des">
                                    <span><em>Type:</em> Mirrorless</span>
                                    <span><em>Color:</em> Black</span>
                                </p>
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-12">
                                <p> {{$item->category->price}}</p>
                            </div>
                            {{-- <div class="col-lg-2 col-md-2 col-12">
                                <p> {{$item->id}}</p>
                                <p> {{$item->user_id}}</p>
                                <p> {{$item->cookie_id}}</p>
                                <p> {{$item->category_id}}</p>
                            </div> --}}
                            <div class="col-lg-1 col-md-2 col-12">
                                <form action="{{ route('cart.destroy', ['id' => $item->id]) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-item"><i class="lni lni-close"></i></button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                <!-- End Single List list -->
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>$2560.00</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$29.00</span></li>
                                        <li class="last">You Pay<span>$2531.00</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="checkout.html" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
@push('webste.scripts')


@endpush



