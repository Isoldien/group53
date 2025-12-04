@extends('layout')

@section('content')

<div class="about-page">
    <div class="about-cream-box">
        <div class="about-container">

            <div class="about-image">
                <img src="{{ asset('images/youzoo.jpg') }}" alt="YouZoo Logo">
            </div>

            <div class="about-text-wrapper">
                <h2 class="about-title">ABOUT US</h2>

                <div class="about-section">
                    <h3>Our Story</h3>
                    <p>YouZoo began with one simple belief: pets make our lives better, so they deserve the very best in return. What started as a small idea between animal-lovers grew into a mission to create a trusted space where pet owners can discover safe, high-quality and environmentally friendly products. Today, YouZoo continues to combine care, community and innovation to support pets and their humans.</p>
                </div>

                <div class="about-section">
                    <h3>Our Mission</h3>
                    <p>Our mission is to provide premium, ethically sourced, and eco-friendly pet products that improve the wellbeing of both pets and owners. We focus on quality, sustainability and transparency, ensuring every item we offer is something we would confidently choose for our own animals.</p>
                </div>

                <div class="about-section">
                    <h3>Our Vision</h3>
                    <p>We envision a world where pets live longer, happier and healthier lives. At YouZoo, we dream of a community built on love, compassion and responsible choices, where every pet owner feels empowered to care for their companion in the best possible way.</p>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- VALUES SECTION --}}
<div class="values-section">
    <h3>OUR VALUES</h3>

    <div class="values-container">
        <div class="value-box">
            <h3>Quality</h3>
            <p>High standards for every product.</p>
        </div>

        <div class="value-box">
            <h3>Care</h3>
            <p>Driven by compassion for pets and people.</p>
        </div>

        <div class="value-box">
            <h3>Sustainability</h3>
            <p>Environmentally friendly practices.</p>
        </div>
    </div>
</div>

@endsection
