<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Shop</title>
    <link rel="stylesheet" href="shoplisting.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="top-nav">
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

    <!-- PAGE HEADER -->
    <header class="page-header">
        <h3>SHOP ALL PRODUCTS</h3>
    </header>

    <!-- MAIN LAYOUT -->
    <div class="layout">

        <!-- FILTER SIDEBAR -->
        <aside class="filters pro">

            <!-- SEARCH BOX -->
            <div class="search-box">
                <label for="search">Search Products</label>
                <input id="search" type="text" placeholder="Search...">
            </div>

            <!-- CATEGORY FILTER -->
            <div class="filter-section">
                <h4>Category</h4>
                <ul>
                    <li>Dog Food</li>
                    <li>Cat Food</li>
                    <li>Pet Toys</li>
                </ul>
            </div>

            <!-- PRICE FILTER -->
            <div class="filter-section">
                <h4>Price Range</h4>
                <ul>
                    <li>£5 - £10</li>
                    <li>£10 - £20</li>
                    <li>£20+</li>
                </ul>
            </div>

            <!-- PET TYPE FILTER -->
            <div class="filter-section">
                <h4>Pet Type</h4>
                <ul>
                    <li>Small Pets</li>
                    <li>Dogs</li>
                    <li>Cats</li>
                </ul>
            </div>

        </aside>

        <!-- PRODUCT GRID -->
        <section class="product-grid pro">

            <div class="grid-item">
                <div class="img-box"></div>
                <p class="title">Product Name</p>
                <span class="price">£12.00</span>
            </div>

            <div class="grid-item">
                <div class="img-box"></div>
                <p class="title">Product Name</p>
                <span class="price">£15.00</span>
            </div>

            <div class="grid-item">
                <div class="img-box"></div>
                <p class="title">Product Name</p>
                <span class="price">£18.00</span>
            </div>

            <div class="grid-item">
                <div class="img-box"></div>
                <p class="title">Product Name</p>
                <span class="price">£10.00</span>
            </div>

            <div class="grid-item">
                <div class="img-box"></div>
                <p class="title">Product Name</p>
                <span class="price">£12.00</span>
            </div>

            <div class="grid-item">
                <div class="img-box"></div>
                <p class="title">Product Name</p>
                <span class="price">£16.00</span>
            </div>

            <!-- PAGINATION -->
            <div class="pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">»</a>
            </div>

        </section>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <p>[Logo] | Links: About | Contact | Policies | Newsletter Signup: Email [Subscribe]</p>
    </footer>

</body>
</html>
