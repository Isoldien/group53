<footer class="footer">

    <div class="footer-left">YouZoo Logo</div>

    <div class="footer-center">
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/contact') }}">Contact</a> |
        <a href="#">Policies</a>
    </div>

    <div class="footer-right">
        Newsletter: 
        <input type="email" placeholder="Your email">
        <button>Subscribe</button>
    </div>

</footer>

@vite('resources/css/footer.css')
