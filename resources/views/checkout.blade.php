@extends('layout')

@section('content')

{{-- Page Background Wrapper --}}
<div class="checkout-page">

    {{-- Checkout Styles --}}
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

    <div class="checkout-container">

        <h2>CHECKOUT PAGE</h2>

        <div class="checkout-wrapper">

            {{-- DELIVERY INFORMATION --}}
            <div class="checkout-box">
                <h3>Delivery Information</h3>

                <form class="checkout-form">
                    <input type="text" placeholder="Full Name">
                    <input type="email" placeholder="Email">
                    <input type="text" placeholder="Phone">

                    <input type="text" placeholder="Address Line">
                    <input type="text" placeholder="City">
                    <input type="text" placeholder="Postcode">
                </form>
            </div>

            {{-- PAYMENT INFORMATION --}}
            <div class="checkout-box">
                <h3>Payment Information</h3>

                <form class="checkout-form">
                    <input type="text" placeholder="Cardholder Name">
                    <input type="text" placeholder="Card Number">
                    <input type="text" placeholder="Expiry Date">

                    <input type="text" placeholder="CVV">
                </form>
            </div>

            {{-- ORDER SUMMARY --}}
            <div class="checkout-summary">
                <h3>Order Summary</h3>

                <div class="summary-item">
                    <span>Dog Toy</span>
                    <span>£10.99</span>
                </div>

                <div class="summary-item">
                    <span>Cat Treats</span>
                    <span>£5.99</span>
                </div>

                <div class="summary-item total">
                    <span>Total</span>
                    <span>£16.98</span>
                </div>

                <button class="checkout-btn">Place Order</button>
            </div>

        </div>
    </div>
</div>

@endsection
