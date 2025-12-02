<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Shop</title>
    <link rel="stylesheet" href="shoplisting.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="nav">
        <h2 class="logo">YouZoo</h2>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Cart (0)</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <h3>SHOP ALL PRODUCTS</h3>
    </div>

    <div class="layout">

        <!-- Filter Sidebar -->
        <aside class="filters">
            <h4>Filters</h4>

            <label>Search Bar:</label>
            <input type="text" id="searchInput" placeholder="Search...">

            <h5>Category Filter</h5>
            <ul>
                <li><input type="checkbox"> Dog Food</li>
                <li><input type="checkbox"> Cat Food</li>
                <li><input type="checkbox"> Pet Toys</li>
            </ul>

            <h5>Price Filter</h5>
            <input type="range" min="5" max="100" value="20">

            <h5>Pet Type</h5>
            <ul>
                <li><input type="checkbox"> Small Pets</li>
                <li><input type="checkbox"> Dogs</li>
                <li><input type="checkbox"> Cats</li>
            </ul>
        </aside>

        <!-- Product Grid -->
        <section class="products">

            <h4 class="grid-title">Product Grid</h4>

            <div class="grid">
                <div class="item">
                    <img src="https://via.placeholder.com/80">
                    <p class="p-name">Product Name</p>
                    <p class="price">£12.00</p>
                </div>

                <div class="item">
                    <img src="https://via.placeholder.com/80">
                    <p class="p-name">Product Name</p>
                    <p class="price">£15.00</p>
                </div>

                <div class="item">
                    <img src="https://via.placeholder.com/80">
                    <p class="p-name">Product Name</p>
                    <p class="price">£17.00</p>
                </div>

                <div class="item">
                    <img src="https://via.placeholder.com/80">
                    <p class="p-name">Product Name</p>
                    <p class="price">£12.00</p>
                </div>

                <div class="item">
                    <img src="https://via.placeholder.com/80">
                    <p class="p-name">Product Name</p>
                    <p class="price">£16.00</p>
                </div>

                <div class="item">
                    <img src="https://via.placeholder.com/80">
                    <p class="p-name">Product Name</p>
                    <p class="price">£15.00</p>
                </div>
            </div>

            <div class="pagination">
                <span>[ Pagination: 1 2 3 9 ]</span>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>[Logo] | Links: About · Contact · Policies</p>
        <p>Newsletter Signup: [Email] [Subscribe]</p>
    </footer>

<script src="shop.js"></script>
</body>
</html>
