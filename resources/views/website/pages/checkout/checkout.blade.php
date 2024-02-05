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
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="titlee">Pricing Table</h5>
                            
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">${{$total}}</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <form class="checkout-form" action="{{ route('checkout.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit"  class="btn btn-alt">Checkout</button>
                                </form>
                    
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->
@endsection
{{-- @push('webste.scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    
function ch() {
    var form = $('#commentForm');
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {
            $('#commentTextID').val('');
            $('#displayComments').load(location.href + ' #displayComments>*', '');
        },
        error: function(error) {
            // Handle the error response
            console.error(error);
        }
    });
}
</script>
@endpush --}}




