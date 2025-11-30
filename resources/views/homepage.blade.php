<!DOCTYPE html>
<html>
<head>
    <title>YouZoo | Home</title>
    @vite(['resources/css/app.css',])
</head>
<body>

<!-- NAV -->
<nav>
    <h2>YouZoo</h2>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="shop.html">Shop</a></li>
        <li><a href="login.html">Login</a></li>
        <li><a href="#">Cart (0)</a></li>
    </ul>
</nav>

<!-- HERO SECTION -->
<div class="hero">
    <div class="hero-text">
        <h1>Discover Quality Pet Products</h1>
        <p>Welcome to YouZoo, where quality meets care.</p>
    </div>

    <div class="hero-img">
        HERO IMAGE
    </div>
</div>

<!-- CATEGORIES -->
<div class="categories">
    <div class="cat-box">Dog Food</div>
    <div class="cat-box">Cat Toys</div>
    <div class="cat-box">Pet Supplies</div>
</div>

<!-- FEATURED PRODUCTS -->
<div class="featured">
    <h2>Featured Products</h2>

    <div class="products">
        <div class="product">[Image] Product 1</div>
        <div class="product">[Image] Product 2</div>
        <div class="product">[Image] Product 3</div>
    </div>
</div>


<footer>
    <div>
        <a href="#">About</a> |
        <a href="#">Contact</a> |
        <a href="#">Policies</a>
    </div>

    <div class="newsletter">
        <input type="email" id="emailInput" placeholder="Email">
        <button onclick="signup()">Subscribe</button>
    </div>
</footer>

<script src="validation.js"></script>
</body>
</html>