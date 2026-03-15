<!DOCTYPE html>
<html>
<head>
    <title>Product needs attention</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width:600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2F855A;">Product "{{$product->product_name}}" with ID {{$product->product_id}} needs stocking!</h2>

        <p>The stock quantity of this product has reached a critical low. Please take action.</p>
       <p> <strong>Do not reply to this email</strong></p>
    </div>
</body>
</html>
