@extends('layout')

@section('content')

{{-- Page Background Wrapper --}}
<div class="checkout-page">

    {{-- Checkout Styles --}}
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

    <div class="checkout-container">

        <h2>CHECKOUT PAGE</h2>

        <form class="checkout-wrapper" action="">

            {{-- DELIVERY INFORMATION --}}
            <div class="checkout-box">
                <h3>Delivery Information</h3>

                <div class="checkout-form">
                    <input name="name" type="text" placeholder="Full Name">
                    <input name="email" type="email" placeholder="Email">
                    <input name="phone" type="text" placeholder="Phone">

                    <input name="adress_line" type="text" placeholder="Address Line">
                    <input name="city" type="text" placeholder="City">
                    <input name="postcode" type="text" placeholder="Postcode">
                    <input name="country" type="text" placeholder="Country">
                    
                </div>
            </div>

            {{-- PAYMENT INFORMATION --}}
            <div class="checkout-box">
                <h3>Payment Information</h3>

                <div class="checkout-form">
                    <input name="c_name" type="text" placeholder="Cardholder Name">
                    <input name="c_number" type="text" placeholder="Card Number">
                    <input name="expiry" type="text" placeholder="Expiry Date">

                    <input name="cvv" type="text" placeholder="CVV">
                </div>
            </div>

            {{-- ORDER SUMMARY --}}
            <div class="checkout-summary">
                <h3>Order Summary</h3>
               @foreach($cartItems as $cartItem)
                <div data-cart-id="{{$cartItem->cart_item_id}}" data-product-id="{{$cartItem->product->product_id}}" class="summary-item">
                    <span>$cartItem->product->product_name</span>
                    <span>$cartItem->product->price</span>
                </div>
                @endforeach
                

                <button type="submit" class="checkout-btn">Place Order</button>
            </div>

        </form>
    </div>
</div>

@endsection
