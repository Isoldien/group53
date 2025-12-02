@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">

<div class="checkout-container">

    <h2>Checkout</h2>

    <div class="checkout-wrapper">

        <!-- Billing -->
        <div class="checkout-box">

            <h3>Billing Information</h3>
            <form class="checkout-form">

                <label>Full Name *</label>
                <input type="text" required>

                <label>Email *</label>
                <input type="email" required>

                <label>Phone Number</label>
                <input type="text">

                <label>Address *</label>
                <input type="text" required>

                <label>City *</label>
                <input type="text" required>

                <label>Postcode *</label>
                <input type="text" required>

            </form>

        </div>

        <!-- Order Summary -->
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

            <hr>

            <div class="summary-item total">
                <strong>Total:</strong>
                <strong>£16.98</strong>
            </div>

            <button class="checkout-btn">Place Order</button>

        </div>

    </div>

</div>
@endsection
