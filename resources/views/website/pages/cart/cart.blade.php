@extends('website.layouts.website')

@section('title', 'Course System')


@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section "  id="cartContainer">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Id</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Product Image</p>
                        </div>
                        <div class="col-lg-4 col-md-2 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-3 col-md-2 col-12">
                            <p>Price</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                <!-- Cart Single List list -->
                @foreach ( $items as $index => $item )
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-2 col-12">
                                <p> {{ $loop->iteration }}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <video 
                                    style="width: 170px; height: auto;" 
                                    id="video_{{ $item->category->id }}" 
                                    
                                >
                                    <source src="{{ asset('upload/' .  $item->category->video) }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="product-details.html">
                                        {{$item->category->name}}</a></h5>
                                <p class="product-des">
                                    <span><em>Main Category:</em>{{$item->category->parent->name}}</span>
                                </p>
                            </div>
                            
                            <div class="col-lg-3 col-md-2 col-12">
                                <p> {{$item->category->price}}</p>
                            </div>

                            <div class="col-lg-1 col-md-2 col-12">
                                <form class="delete-form" id="delete_form_{{ $index }}" action="{{ route('cart.destroy', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="remove-item" onclick="deleteForm('{{ $index }}', '{{ $item->id }}')"><i class="lni lni-close"></i></button>
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
                                        {{-- <li>Cart Subtotal<span>$2560.00</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$29.00</span></li> --}}
                                        <li class="last">You Pay<span>${{$total}}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout.create') }}" class="btn" onclick="checkout({{ $items->count() }})">Checkout</a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function checkout(itemCount) {
        if (itemCount === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please add items to your cart before checking out.',
                confirmButtonText: 'OK',
            });
        }
    }
</script>
@endpush




