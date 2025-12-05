<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-w-600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2F855A;">Hi!<br>{{ $data['name'] }},</h2>
        
        <p>Thank you for reaching out to YouZoo. We have recieved your message, we can't wait to help you fix your pet needs</p>
        
        <div style="background-color: #f7fafc; padding: 15px; border-radius: 8px; margin: 20px 0;">
            <h3 style="margin-top: 0; color: #4a5568;">Your Message:</h3>
            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
            <p><strong>Message:</strong></p>
            <p style="white-space: pre-line;">{{ $data['message'] }}</p>
        </div>

        <p>We're working on getting back to you as soon as possible</p>
        
        <p>Take care,<br>
        <strong>YouZoo</strong></p>
    </div>
</body>
</html>
