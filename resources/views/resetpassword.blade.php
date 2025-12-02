<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouZoo | Reset Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navbar">
    <div class="logo-area">
        <img src="youzoo.png" alt="YouZoo Logo" class="logo-img">
         <h2 class="logo">YouZoo</h2>
    </div>
   
    <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="shop.html">Shop</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="#">Cart (0)</a></li>
        <li><a href="login.html">Login</a></li>
    </ul>
</nav>

<section class="login-section">
    <div class="login-box">
        <h3>RESET YOUR PASSWORD</h3>

        <label>Email Address:</label>
        <input type="email" id="resetEmail" placeholder="Enter your email">

        <button onclick="sendReset()">Send Reset Link</button>

        <p class="small-links">
            Back to <a href="login.html">Login</a>
        </p>

        <p class="small-links">
            Don’t have an account? <a href="register.html">Register Here</a>
        </p>
    </div>
</section>

<footer>
    <div class="footer-content">
        <p>YouZoo © 2025 | About | Contact | Policies</p>
        <p>Newsletter Signup: [Email] [Subscribe]</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
