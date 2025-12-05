<!DOCTYPE html>
<html>
<head>
    <title>Product Listing</title>
</head>
<body>
    <h1>Our Products</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <a href="{{ route('cart.add', ['id' => $product->id]) }}">Add to Cart</a>
            </li>
        @endforeach
    </ul>
</body>
</html>