<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Management</title>

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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .filter-form {
            margin-bottom: 20px;
        }

        .filter-form input, .filter-form select {
            padding: 8px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .filter-form button {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .filter-form button:hover {
            background-color: #218838;
        }

        .actions {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Order Management</h1>

    <!-- Filter/Search Form -->
    <form class="filter-form" method="GET" action="{{ route('orders.index') }}">
        <input type="text" name="product_search" placeholder="Search by Product or Brand" value="{{ request('product_search') }}">
        <input type="text" name="user_search" placeholder="Search by User" value="{{ request('user_search') }}">
        <select name="status">
            <option value="">Select Status</option>
            <option value="{{ \App\enums\OrderStatus::Pending->value }}" {{ request('status') === \App\enums\OrderStatus::Pending->value ? 'selected' : '' }}>Pending</option>
            <option value="{{ \App\enums\OrderStatus::Shipped->value }}" {{ request('status') === \App\enums\OrderStatus::Shipped->value ? 'selected' : '' }}>Shipped</option>
            <option value="{{ \App\enums\OrderStatus::Delivered->value }}" {{ request('status') === \App\enums\OrderStatus::Delivered->value ? 'selected' : '' }}>Delivered</option>
            <option value="{{ \App\enums\OrderStatus::Packed->value }}" {{ request('status') === \App\enums\OrderStatus::Packed->value ? 'selected' : '' }}>Packed</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <!-- Actions: Ship all pending orders or deliver all shipped orders -->
    <div class="actions">
        <form action="{{ route('orders.ship_all') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="button">Mark All Pending as Shipped</button>
        </form>
        <form action="{{ route('orders.deliver_all') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="button" style="background-color: #28a745;">Mark All Shipped as Delivered</button>
        </form>
    </div>

    <!-- Orders Table -->
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Status</th>
            <th>Total Amount</th>
            <th>Order Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->status }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
                <td>{{ $order->order_date->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order->order_id) }}" class="button">Process</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div style="text-align: center;">
        {{ $orders->appends(request()->query())->links() }}
    </div>
</div>
</body>
</html>
