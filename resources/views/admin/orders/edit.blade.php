@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md dark:bg-[#1f2937]">

        <h1 class="text-2xl font-semibold text-center text-gray-900 dark:text-gray-100">Edit Order #{{ $order->order_id }}</h1>

        <form action="{{ route('orders.update') }}" method="POST" class="mt-8">
            @csrf

            <div class="form-group mb-6">
                <label for="order_id" class="block text-gray-700 dark:text-gray-300 font-medium">Order ID:</label>
                <input type="text" id="order_id" name="order_id" value="{{ $order->order_id }}" class="mt-1 p-3 w-full border rounded-lg dark:bg-[#2d3748] dark:text-white dark:border-[#4a5568]" readonly>
            </div>

            <div class="form-group mb-6">
                <label for="status" class="block text-gray-700 dark:text-gray-300 font-medium">Order Status:</label>
                <select id="status" name="status" class="mt-1 p-3 w-full border rounded-lg dark:bg-[#2d3748] dark:text-white dark:border-[#4a5568]">
                    <option value="{{ \App\enums\OrderStatus::Packed->value }}" {{ $order->status === \App\enums\OrderStatus::Packed->value ? 'selected' : '' }}>Packed</option>
                    <option value="{{ \App\enums\OrderStatus::Shipped->value }}" {{ $order->status === \App\enums\OrderStatus::Shipped->value ? 'selected' : '' }}>Shipped</option>
                    <option value="{{ \App\enums\OrderStatus::Delivered->value }}" {{ $order->status === \App\enums\OrderStatus::Delivered->value ? 'selected' : '' }}>Delivered</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Update Status</button>
            </div>
        </form>

        <div class="mt-8 p-6 bg-gray-100 rounded-lg dark:bg-[#2d3748]">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Order Information</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>User Name:</strong> {{ $order->user->name }}</p>
            <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Total Amount:</strong> ${{ number_format($order->total_price, 2) }}</p>
            <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Order Date:</strong> {{ $order->order_date->format('M d, Y') }}</p>
            <p class="text-gray-700 dark:text-gray-300 mt-2"><strong>Shipping Address:</strong> {{ $order->address->address_line }}, {{ $order->address->city }}, {{ $order->address->postal_code }}</p>
        </div>
    </div>
@endsection
