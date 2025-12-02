@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">

<div class="contact-section">

    <!-- LEFT SIDE -->
    <div class="contact-left">
        <h2>Get In Touch</h2>
        <p class="intro">Reach out for advice and quality pet products.</p>

        <h3>Contact Details</h3>
        <ul class="details">
            <li><strong>Address:</strong> 123 YouZoo Street, Birmingham</li>
            <li><strong>Email:</strong> support.youZoo@gmail.com</li>
            <li><strong>Phone:</strong> 0121 000 0000</li>
        </ul>
    </div>

    <!-- RIGHT SIDE -->
    <div class="contact-right">
        <h2>Contact Us</h2>

        <form class="contact-form">
            <input type="text" placeholder="First Name *" required>
            <input type="text" placeholder="Last Name *" required>
            <input type="email" placeholder="Email *" required>
            <input type="text" placeholder="Phone">

            <textarea placeholder="Your Message"></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

</div>

<div class="beige-strip"></div>
@endsection

