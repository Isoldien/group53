<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        @foreach ($cartItems as $item)
            <li>
                <h2>{{ $item->product->name }}</h2>
                <p>Quantity: {{ $item->quantity }}</p>
                <p>Price: ${{ $item->product->price }}</p>
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="number" name="quantity" value="{{ $item->quantity }}">
                    <button type="submit">Update</button>
                </form>
                <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button type="submit">Remove</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>