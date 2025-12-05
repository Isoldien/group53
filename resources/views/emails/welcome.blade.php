<!DOCTYPE html>
<html>
<head>
    <title>Welcome to YouZoo</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-w-600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2F855A;">Welcome to YouZoo, {{ $user->name }}!</h2>
        
        <p>We are thrilled to have you here, hope we can fufil your pet needs</p>
        
        <p>Your account has been successfully created. You can now login to access all of our features</p>
        
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('login') }}" style="background-color: #2F855A; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                Login to Your Account
            </a>
        </div>
        
        <p>If you have any questions, feel free to reply to this email.</p>
        
        <p>Best regards,<br>
        <strong>YouZoo</strong></p>
    </div>
</body>
</html>
