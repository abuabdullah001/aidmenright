@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>

<section class="inner-header-title" style="background-image:url(https://modimarketing.com/wp-content/uploads/2016/01/Contact-header-background-image-1.jpg);">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</section>

@php
$footers = App\Models\contactUs::all();
@endphp

<div class="clearfix"></div>
<!-- Title Header End -->
<!-- Contact Page Section Start -->
<section class="contact-page">
    <div class="container">
        <h2>Drop A Mail</h2>
        @foreach ($footers as $footer)
            <div class="col-md-4 col-sm-4">
                <div class="contact-box">
                    <i class="fa fa-map-marker"></i>
                    <p>{{ $footer->address_one }}</p>
                    <p>Bangladesh</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="contact-box">
                    <i class="fa fa-envelope"></i>
                    <p>{{ $footer->email }}</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="contact-box">
                    <i class="fa fa-phone"></i>
                    <p>{{ $footer->phone }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- Contact section End -->

<!-- contact form -->
<section class="contact-form">
    <div class="container">
        <h2>Drop A Mail</h2>

        <form action="{{ route('contact.store') }}" method="POST"> <!-- Start the form -->
            @csrf <!-- Include CSRF token -->
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            </div>

            <div class="col-md-6 col-sm-6">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>

            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
            </div>

            <div class="col-md-12 col-sm-12">
                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
            </div>

            <div class="col-md-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form> <!-- End the form -->
    </div>
</section>
<!-- Contact form End -->

@endsection
