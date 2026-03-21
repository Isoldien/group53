<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        select, button {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        select {
            width: 100%;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .status-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .status-info p {
            font-size: 1.1rem;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Order #{{ $order->order_id }}</h1>

    <form action="{{ route('orders.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="order_id">Order ID:</label>
            <input type="text" id="order_id" name="order_id" value="{{ $order->order_id }}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Order Status:</label>
            <select id="status" name="status">
                <option value="{{ \App\enums\OrderStatus::Packed->value }}" {{ $order->status === \App\enums\OrderStatus::Packed->value ? 'selected' : '' }}>Packed</option>
                <option value="{{ \App\enums\OrderStatus::Shipped->value }}" {{ $order->status === \App\enums\OrderStatus::Shipped->value ? 'selected' : '' }}>Shipped</option>
                <option value="{{ \App\enums\OrderStatus::Delivered->value }}" {{ $order->status === \App\enums\OrderStatus::Delivered->value ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <button type="submit" class="button">Update Status</button>
    </form>

    <div class="status-info">
        <h3>Current Order Status: {{ $order->status }}</h3>
        <p><strong>User Name:</strong> {{ $order->user->name }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($order->total_price, decimals: 2) }}</p>
        <p><strong>Order Date:</strong> {{ $order->order_date->format('M d, Y') }}</p>
        <p><strong>Shipping Address:</strong> {{ $order->address->address_line}},{{$order->address->city}},{{$order->address->postal_code }}</p>
    </div>
</div>
</body>
</html>
