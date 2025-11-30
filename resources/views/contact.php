<!DOCTYPE html>
<html lang = "en">
<head> 
    <meta charset = "UTF-8"> 
    <meta name = "viewport" content="width-device-width, initial-scale= 1.0">
    <title>Contact Us - YouZ00</title>
    <link rel = "stylesheet" href="contact.css">
</head>
<body> 

       <!-- NAVBAR-->
        <nav class ="navbar">
            <div class = "logo">YouZoo</div>
            <ul class = "nav-links">
                <li><a href ="index.html">Home</a></li>
                <li><a href= "#">Shop</a></li>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
                <li><a href = "#">Cart (0)</a></li>
                <li><a href = "#">Login</a></li>
            </ul>
        </nav>


        <!--CONTACT US SECTION-->
        <section class ="contact-section">

            <!--LEFT SIDE (TEXT & DETAILS)-->
            <div class = "contact-left">
                <h2>Get In Touch</h2>
                <p class = "intro">Reach out for advice and quality pet products.</p>

                <h3> Contact Details</h3>
                <ul class ="details">
                    <li><strong>Address:</strong> 123 YouZoo Street, Birmingham</li>
                    <li><strong>Email:</strong> support.youZoo@gmail.com</li>
                    <li><strong>Phone:</strong> 0121 000 0000</li>


                </ul>
            </div>

            <!-- RIGHT SIDE (FORM)-->
             <div class = "contact-right">
                <h2>Contact us</h2>

                <form class = "contact-form">
                    <input type ="text" placeholder="First Name *" required>
                    <input type ="text" placeholder="Last Name *" required>
                    <input type ="text" placeholder="Email *" required>
                    <input type = "text" placeholder ="Phone">

                    <textarea placeholder ="Your Message"></textarea>
                    <button type= "submit">Submit</button>


                </form>
             </div>
        </section>

        <!--BEIGE-->
        <div class ="beige-strip"></div>

        <!--FOOTER-->
        <footer class = "footer"> 
            <div class = "footer-left">YouZoo Logo</div>
            <div class = "footer-center">
                <a href= "about.html">About us</a> |
                <a href = "contact.html">Contact</a> |
                <a href="#">Policies</a>
            </div>
            <div class = "footer-right">
                Newsletter:
                <input type = "email" placeholder = "Your email">
                <button>Subscribe</button>
            </div>
        </footer>
</body>

</html>