<!DOCTYPE html>
<html>
<head>
    <title>YouZoo | Login</title>
    @vite(['resources/css/app.css',])
</head>
<body>

<nav>
    <h2>YouZoo</h2>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="shop.html">Shop</a></li>
        <li><a href="login.html">Login</a></li>
        <li><a href="#">Cart (0)</a></li>
    </ul>
</nav>

<div class="login-box">
    <h2>Login To Your Account</h2>

    <label>Email Address</label>
    <input type="email" id="loginEmail" placeholder="Enter email">

    <label>Password</label>
    <input type="password" id="loginPassword" placeholder="Enter password">

    <button onclick="loginUser()">Login</button>

    <p style="margin-top:10px;">
        Forgot Password? <a href="#">Reset Here</a><br><br>
        Don’t have an account? <a href="#">Register</a>
    </p>
</div>

<footer>
    <div>
        <a href="#">About</a> |
        <a href="#">Contact</a> |
        <a href="#">Policies</a>
    </div>

    <div class="newsletter">
        <input id="emailInput" type="email" placeholder="Email">
        <button onclick="signup()">Subscribe</button>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
