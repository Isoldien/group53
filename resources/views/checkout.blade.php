<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total: ${{ $cartItems->sum(fn($item) => $item->product->price * $item->quantity) }}</p>
</body>
</html>