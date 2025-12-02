<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouZoo | Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo-area">
        <img src="youzoo.png" alt="YouZoo Logo" class="logo-img">
        
    </div>
    <h2 class="logo">YouZoo</h2>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Cart (0)</a></li>
        <li><a href="login.html">Login</a></li>
    </ul>
</nav>


<section class="login-section">
    <div class="login-box fade-in">
        <h3>CREATE YOUR ACCOUNT</h3>

        <label>Full Name:</label>
        <input type="text" id="fullname" placeholder="Enter your name">

        <label>Email Address:</label>
        <input type="email" id="regEmail" placeholder="Enter your email">

        <label>Password:</label>
        <input type="password" id="regPassword" placeholder="Create password">

        <label>Confirm Password:</label>
        <input type="password" id="regConfirmPassword" placeholder="Re-enter password">

        <button onclick="registerUser()">Register</button>

        <p class="small-links">
            Already have an account? <a href="login.html">Login Here</a>
        </p>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-content">
        <p>YouZoo © 2025 | About | Contact | Policies</p>
        <p>Subscribe to Newsletter</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
