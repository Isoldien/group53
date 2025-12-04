<nav class="navbar">
    <div class="logo">YouZoo</div>

    <ul class="nav-links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
        <li><a href="#">Cart (0)</a></li>
        <li><a href="#">Login</a></li>
    </ul>
</nav>


@vite('resources/css/nav.css')
