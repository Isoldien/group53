<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YouZoo – Discover Quality Pet Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>

    
    <header class="yz-header">
    <div class="yz-container nav-container">

        
        <div class="logo">
            <img src="{{ asset('images/Logo.png') }}" alt="YouZoo Logo">
        </div>

        
        <nav class="main-nav">
            <a href="{{ url('/') }}" class="active">Home</a>
            <a href="#shop">Shop</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>

        
        <div class="nav-actions">
            <a href="#cart" class="btn-nav btn-cart">Cart (0)</a>
            <a href="#login/sign up" class="btn-nav btn-login">Login/Sign up</a>
        </div>

    </div>
    </header>
    
    <main>
        <section class="hero">
            <div class="yz-container hero-grid">
                
                <div class="hero-left">
                    <h1>Discover Quality Pet Products</h1>
                    <p>
                        Welcome to YouZoo, where quality meets care.
                        Thoughtfully selected essentials for every pet in your family.
                    </p>
                    <a href="shop.html" class="btn btn-primary">Explore Now</a>
                </div>

                
                <div class="hero-right">
                    <div class="hero-slider">
        
                        <img class="hero-slide active"
                        src="{{ asset('images/catimage.jpg') }}"
                        alt="Relaxed cat on a comfy bed">

        
                        <img class="hero-slide"
                        src="{{ asset('images/dog.jpeg') }}"
                        alt="Plush Comfort Toy">

        
                        <img class="hero-slide"
                        src="{{ asset('images/fourpets.jpeg') }}"
                        alt="Ocean Blend Salmon & Tuna">

       
        {{--            <img class="hero-slide"
                        src="{{ asset('images/petacc.jpg') }}"
                        alt="Grain-Free Salmon & Sweet Potato"> --}}

        
                        <button class="hero-nav prev">‹</button>
                        <button class="hero-nav next">›</button>
                    </div>
                </div>

            </div>
        </section>

       
        <section class="categories">
            <div class="yz-container">
                <h2 class="section-title">Shop by Category</h2>

                <div class="category-grid">
                    <a href="shop.html?category=dog-food" class="category-card">
                        <h3>Dog Food</h3>
                        <p>Nutritious meals for playful pups.</p>
                    </a>

                    <a href="shop.html?category=cat-food" class="category-card">
                        <h3>Cat Food</h3>
                        <p>Balanced recipes for curious cats.</p>
                    </a>

                    <a href="shop.html?category=pet-toys" class="category-card">
                        <h3>Pet Toys</h3>
                        <p>Keep them active, engaged and happy.</p>
                    </a>

   
                    <a href="shop.html" class="category-card">
                        <h3>More Categories</h3>
                        <p>Browse all product ranges.</p>
                    </a>

                    <a href="shop.html?category=accessories" class="category-card">
                        <h3>Accessories</h3>
                        <p>Essential items for comfort, feeding, and travel.</p>
                    </a>

                </div>
            </div>
        </section>

      
        <section class="featured">
            <div class="yz-container">
                <h2 class="section-title">Featured Products</h2>

                <div class="product-grid">


                    <article class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/plush.jpg') }}" alt="Plush Comfort Toy">
                        </div>
                        <h3 class="product-name">Plush Comfort Toy</h3>
                        <p class="product-price">£8.99</p>
                        <a href="product-details.html?product=plush-comfort-toy" class="btn btn-secondary">View Details</a>
                    </article>


                    <article class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/Oceanblend.jpg') }}" alt="Ocean Blend Salmon & Tuna">
                        </div>
                        <h3 class="product-name">Ocean Blend Salmon & Tuna</h3>
                        <p class="product-price">£10.99</p>
                        <a href="product-details.html?product=cat-salmon-tuna" class="btn btn-secondary">View Details</a>
                    </article>


                    <article class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/grainfree.jpeg') }}" alt="Grain-Free Salmon & Sweet Potato">
                        </div>
                        <h3 class="product-name">Grain-Free Salmon & Sweet Potato</h3>
                        <p class="product-price">£21.50</p>
                        <a href="product-details.html?product=grain-free-salmon" class="btn btn-secondary">View Details</a>
                    </article>


                    <article class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('images/waterdispenser.jpg') }}" alt="Travel Water Bottle Dispenser">
                        </div>
                        <h3 class="product-name">Travel Water Bottle Dispenser</h3>
                        <p class="product-price">£12.99</p>
                        <a href="product-details.html?product=travel-water-bottle" class="btn btn-secondary">View Details</a>
                    </article>

                </div>

            </div>
        </section>
    </main>

    
    <footer class="yz-footer">
        <div class="yz-container footer-grid">
            <div class="footer-brand">
                <h3>YouZoo</h3>
                <p>Thoughtful, high-quality products for pets and the people who love them.</p>
            </div>

            <div class="footer-links">
                <h4>Links</h4>
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>

            <div class="footer-newsletter">
                <h4>Newsletter</h4>
                <p>Get updates on new arrivals and offers.</p>
                <form action="#" method="post" class="newsletter-form">
                    <input type="email" name="email" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary btn-small">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="yz-container">
                <p>&copy; {{ date('Y') }} YouZoo. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.hero-slide');
        const prevBtn = document.querySelector('.hero-nav.prev');
        const nextBtn = document.querySelector('.hero-nav.next');

        if (!slides.length || !prevBtn || !nextBtn) return;

        let current = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function goNext() {
            current = (current + 1) % slides.length;
            showSlide(current);
        }

        function goPrev() {
            current = (current - 1 + slides.length) % slides.length;
            showSlide(current);
        }

        nextBtn.addEventListener('click', goNext);
        prevBtn.addEventListener('click', goPrev);

    
        setInterval(goNext, 5000);
    });
    </script>


</body>
</html>
