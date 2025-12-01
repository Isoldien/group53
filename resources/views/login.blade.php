<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouZoo | Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navbar">
    <h2 class="logo">YouZoo</h2>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Cart (0)</a></li>
        <li><a href="#">Login</a></li>
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
            Forgot Password? <a href="#">Reset Link</a>
        </p>

        <p class="small-links">
            Don't have an account? <a href="#">Register Here</a>
        </p>
    </div>
</section>

<footer>
    <div class="footer-content">
        <p>[Logo] | Links: About | Contact | Policies</p>
        <p>Newsletter Signup: [Email] [Subscribe]</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
