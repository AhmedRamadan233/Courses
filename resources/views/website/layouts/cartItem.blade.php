<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{$items->count()}}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item" >
        <div class="dropdown-cart-header">
            @if ($items->count() > 1)
                <span>{{$items->count()}} Items</span>
            @else
                <span>{{$items->count()}} Item</span>
            @endif
            
            <a href="{{route('cart.index')}}">View Cart</a>
        </div>
        <ul class="shopping-list">
            @foreach ($items as $index=> $item )
            <li>
                
                <div class="remove">
                    <form style="display: inline;" class="delete-form" id="delete_form_{{ $index }}" action="{{ route('cart.destroy', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="remove" onclick="deleteForm('{{ $index }}', '{{ $item->id }}')"><i class="lni lni-close"></i></button>
                    </form>
                      
                    
                </div>
                <div class="cart-img-head">
                    <video 
                        style="width: 90px; height: auto;" 
                        id="video_{{ $item->category->id }}" 
                       
                    >
                        <source src="{{ asset('upload/' .  $item->category->video) }}" type="video/mp4">
                    </video>
                </div>

                <div class="content">
                    <h4><a href="product-details.html">
                            {{$item->category->name}}</a></h4>
                    <pz<span class="amount">$ {{$item->category->price}}</span></p>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">${{$total}}</span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>