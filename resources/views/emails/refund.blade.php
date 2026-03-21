<!DOCTYPE html>
<html>
<head>
    <title>Welcome to YouZoo</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2F855A;">Refund for {{ $user->name }}!</h2>

        <p>We have sent you a refund of £{{$refund_amount}}</p>

        <p>This is because the amount you purchased for one of our products exceeded our stock</p>



        <p>We are sorry for any inconvenience.</p>

        <p>Best regards,<br>
        <strong>YouZoo</strong></p>
    </div>
</body>
</html>
