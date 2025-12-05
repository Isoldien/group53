<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">{{ $product->product_name }}</h1>

        <div class="bg-white p-6 rounded shadow">
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> £{{ number_format($product->price, 2) }}</p>
            <p><strong>Brand:</strong> {{ $product->brand }}</p>
            <p><strong>Pet Type:</strong> {{ $product->pet_type }}</p>
            <p><strong>Stock Quantity:</strong> {{ $product->stock_quantity }}</p>
        </div>

        <a href="{{ url()->previous() }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Back</a>
    </div>
</body>
</html>