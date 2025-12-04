@extends('layout')

@push('styles')
    @vite('resources/css/contact.css')
@endpush

@section('content')

<div class="contact-page">
    
    <h1 class="contact-title">Contact Us</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="contact-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Messages --}}
    @if($errors->any())
        <div class="contact-errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="contact-container">

        {{-- LEFT SIDE --}}
        <div class="contact-left">
            <h2>Get In Touch</h2>

            <p>Reach out for expert advice and quality pet products.</p>

            <ul class="contact-details">
                <li><strong>Address:</strong> 123 YouZoo Street, Birmingham</li>
                <li><strong>Email:</strong> support.youZoo@gmail.com</li>
                <li><strong>Phone:</strong> 0121 000 0000</li>
            </ul>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="contact-form-box">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div class="input-row">
                    <input type="text" name="first_name" placeholder="First Name *" required>
                    <input type="text" name="last_name" placeholder="Last Name *" required>
                </div>

                <div class="input-row">
                    <input type="email" name="email" placeholder="Email *" required>
                    <input type="text" name="phone" placeholder="Phone">
                </div>

                <textarea name="message" placeholder="Your Message *" required></textarea>

                <button type="submit" class="contact-submit-btn">Submit</button>
            </form>
        </div>

    </div>
</div>

@endsection
