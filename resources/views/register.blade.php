<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Create Your Account</title>

   
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

   
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>

    
    <header class="yz-header">
        <div class="yz-container nav-container">

            
            <div class="logo">
                <img src="{{ asset('images/Logo.png') }}" alt="YouZoo Logo">
            </div>

           
            <nav class="main-nav">
                <a href="{{ url('/') }}">Home</a>
                <a href="#shop">Shop</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </nav>

            
            <div class="nav-actions">
                <a href="#cart" class="btn-nav btn-cart">Cart (0)</a>
                <a href="#login" class="btn-nav btn-login">Login</a>
            </div>
        </div>
    </header>

   
    <main class="yz-main">
        <section class="auth-section">
            <div class="yz-container auth-container">

                <div class="auth-card">
                    <h1 class="auth-title">CREATE YOUR ACCOUNT</h1>

                    <form class="auth-form" method="POST" action="#">
                        

                        <div class="auth-row">
                            <label for="first_name">First Name: <span>*</span></label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>

                        <div class="auth-row">
                            <label for="last_name">Last Name: <span>*</span></label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>

                        <div class="auth-row">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone">
                        </div>

                        <div class="auth-row">
                            <label for="email">Email Address: <span>*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="auth-row">
                            <label for="password">Password: <span>*</span></label>
                            <input type="password" id="password" name="password" required>
                        </div>

                        <div class="auth-row">
                            <label for="password_confirmation">Confirm Password: <span>*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="auth-row auth-row-inline">
                            <label class="auth-checkbox">
                                <input type="checkbox" name="terms" required>
                                <span>I agree to the Terms &amp; Conditions and Privacy Policy.</span>
                            </label>
                        </div>

                        <div class="auth-actions">
                            <button type="submit" class="btn-auth-primary">
                                Create Account
                            </button>
                        </div>

                        <p class="auth-footer-text">
                            Already have an account?
                            <a href="#login">Login Here</a>
                        </p>
                    </form>
                </div>

            </div>
        </section>
    </main>

    
    <footer class="yz-footer">
        <div class="yz-container footer-container">
            <div class="footer-logo">
                [Logo]
            </div>

            <div class="footer-links">
                [Links:
                <a href="#about">About</a> |
                <a href="#contact">Contact</a> |
                <a href="#policies">Policies</a>
                ]
            </div>

            <div class="footer-newsletter">
                [Newsletter Signup:
                <input type="email" placeholder="Email">
                <button type="button">Subscribe</button>
                ]
            </div>
        </div>
    </footer>

</body>
</html>
