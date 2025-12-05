<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products by Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Products in Category</h1>

        @if($productsOfCategory->isEmpty())
            <p>No products found in this category.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($productsOfCategory as $product)
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-xl font-semibold">{{ $product->product_name }}</h2>
                        <p>{{ $product->description }}</p>
                        <p class="text-green-600 font-bold">£{{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $productsOfCategory->links() }}
            </div>
        @endif
    </div>
</body>
</html>