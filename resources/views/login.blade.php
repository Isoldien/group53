<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouZoo | Login</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    @vite(['resources/css/styles.css'])
</head>
<body>

<nav class="navbar">
    <div class="logo-area">
    <img src="youzoo.png" class="logo-img">
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
        <h3>LOGIN TO YOUR ACCOUNT</h3>

        <label>Email Address:</label>
        <input type="email" id="email" placeholder="Enter your email">

        <label>Password:</label>
        <input type="password" id="password" placeholder="Enter your password">

        <button onclick="loginUser()">Login</button>

        <p class="small-links">
            Forgot Password? <a href="resetpassword.html">Reset Link</a>
        </p>

        <p class="small-links">
            Don't have an account? <a href="register.html">Register Here</a>
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
