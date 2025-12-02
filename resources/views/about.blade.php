@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">

<section class="about-section">

    <div class="image-placeholder">
        <img src="https://via.placehold.co/520x350/png" alt="About YouZoo">
    </div>

    <div class="about-text">
        <h2>About Us</h2>

        <h3>Our Story</h3>
        <p>YouZoo began with a simple idea: to create a place where pet lovers can find 
           high-quality and sustainable products for their furry companions.</p>

        <h3>Our Mission</h3>
        <p>Our mission is to provide premium, safe, and eco-friendly products that 
           enhance the lives of both pets and owners.</p>

        <h3>Our Vision</h3>
        <p>We envision a world where pets live happier and healthier lives, supported 
           by love, care, and sustainability.</p>
    </div>

</section>


<section class="values-section">
    <h2>Our Values</h2>

    <div class="values-container">

        <div class="value-box">
            <h3>Quality</h3>
            <p>We prioritise high standards to ensure every product is safe and reliable.</p>
        </div>

        <div class="value-box">
            <h3>Care</h3>
            <p>Every decision is driven by compassion for pets, people, and the planet.</p>
        </div>

        <div class="value-box">
            <h3>Sustainability</h3>
            <p>We support environmentally friendly practices to build a better future.</p>
        </div>

    </div>
</section>
@endsection
