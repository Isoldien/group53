@extends('layout')

@section('content')

{{-- Page Background Wrapper --}}
<div class="checkout-page">

    {{-- Checkout Styles --}}
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

    <div class="checkout-container">

        <h2>CHECKOUT PAGE</h2>
       @if(session('error'))
    <div style="
        padding: 10px 15px;
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
        border-radius: 5px;
        margin-bottom: 15px;
    ">
        {{ session('error') }}
    </div>
@endif
        <form action="{{route('placeOrder')}}" method="POST" class="checkout-wrapper">
                 @csrf

            
            <div class="checkout-box">
                <h3>Delivery Information</h3>

                <div class="checkout-form">
                    <input required name="name" type="text" placeholder="Full Name">
                    <input required name="email" type="email" placeholder="Email">
                    <input required name="phone" type="text" placeholder="Phone">

                    <input required name="adress_line" type="text" placeholder="Address Line">
                    <input required name="city" type="text" placeholder="City">
                    <input required name="postcode" type="text" placeholder="Postcode">
                    <input required name="country" type="text" placeholder="Country">
                    
                </div>
            </div>

          
            <div class="checkout-box">
                <h3>Payment Information</h3>

                <div class="checkout-form">
                    <input required name="c_name" type="text" placeholder="Cardholder Name">
                    <input required  name="c_number" type="text" placeholder="Card Number">
                    <input required name="expiry" type="text" placeholder="Expiry Date">

                    <input name="cvv" type="text" placeholder="CVV">
                </div>
            </div>

          
            <div class="checkout-summary">
                <h3>Order Summary</h3>
               @foreach($cartItems as $cartItem)
                <div class="summary-item"
             
                  data-product-id="{{ $cartItem->product->product_id }}"
                  style="display:flex;justify-content:space-between;align-items:center;margin:10px 0;gap:10px;">
            
            <span>{{ $cartItem->product->product_name }}</span>

            <div style="display:flex;align-items:center;gap:6px;">
                <button class="decrease-qty checkout-btn" style="padding:4px 8px;">-</button>

                <span class="item-qty">{{ $cartItem->quantity }}</span>

                <button class="increase-qty checkout-btn" style="padding:4px 8px;">+</button>
            </div>

            <span class="item-subtotal">
                £{{ number_format($cartItem->subtotal, 2) }}
            </span>
        </div>
                @endforeach
                  <hr>

             <div style="display:flex;justify-content:space-between;font-weight:bold;font-size:18px;">
               <span>Total:</span>
               <span id="basket-total">£{{ number_format($cartItems->sum('subtotal'), 2) }}</span>
             </div>

                <button type="submit" class="checkout-btn">Place Order</button>
            </div>

        </form>
    </div>
</div>
<script>
function updateTotals(parent, data) {
    if (data.qty === 0) {
        parent.remove();
    } else {
        parent.querySelector('.item-qty').textContent = data.qty;
        parent.querySelector('.item-subtotal').textContent = "£" + data.subtotal.toFixed(2);
    }

    document.getElementById('basket-total').textContent = "£" + data.total.toFixed(2);
}

function sendUpdate(url, parent) {
    fetch(url, {
        method: "POST",
        headers: { 
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}" 
        }
    })
    .then(res => res.json())
    .then(data => updateTotals(parent, data))
    .catch(err => console.error(err));
}

document.querySelectorAll('.increase-qty').forEach(btn => {
    btn.addEventListener('click', function () {
        let parent = this.closest('.summary-item');
        let productId = parent.dataset.productId;
        sendUpdate(`/basket/increase/${productId}`, parent);
    });
});

document.querySelectorAll('.decrease-qty').forEach(btn => {
    btn.addEventListener('click', function () {
        let parent = this.closest('.summary-item');
        let productId = parent.dataset.productId;
        sendUpdate(`/basket/decrease/${productId}`, parent);
    });
});



</script>

@endsection
