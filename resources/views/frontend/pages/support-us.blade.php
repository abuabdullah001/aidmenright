@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')

<style>
    h1,
    h2{
        text-align: center;
    }

    p {
        margin: 0;
    }

    .hero {
        background-image: url("{{ asset('images/bangladesh-flooding-aerial.jpg') }}");
        background-size: cover;
        background-position: center;
        color: white;
        height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
    }

    .overlay {
        background-color: rgba(0 0 0 / 81%);
        padding: 115px;
        width: 100%;
        position: absolute;
        top: 208px;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Donation Amount Section */
    .donation-amount {
        background-color: #f2f2f2;
        padding: 20px 0;
    }

    .donation-amount h2 {
        font-size: 48px;
        margin-bottom: 5px;
    }

    .donation-amount p {
        font-size: 16px;
        color: #555;
    }

    /* Icons Section */
    .icons {
        display: flex;
        justify-content: space-around;
        padding: 20px 0;
        background-color: #fff;
    }

    .icon-item {
        text-align: center;
    }

    .icon-item img {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }

    .icon-item p {
        margin: 0;
        font-size: 14px;
    }

    /* Updated Sponsorship Form Section with Gradient Background */
    .sponsorship-form {
        max-width: 757px;
        margin: 100px auto 71px auto;
        padding: 20px;
        text-align: center;
        background: white;
        border-radius: 10px;
    }

    .sponsorship-form form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
    }

    .sponsorship-form label {
        font-weight: bold;
        color: black; /* Text color for labels */
    }

    .sponsorship-form input,
    .sponsorship-form textarea {
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        padding: 10px;
    }

    .submit-button {
        background-color: blue;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-button:hover {
        background-color: #333;
    }
</style>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<!-- Hero Section -->
<section class="hero">
    <div class="overlay">
        <h2 style="font-weight: 600;color: white;">Contribute any amount to support people's in disaster affected area.</h2>
        <p style="color: white;text-align: center;">Within every disaster people lies boundless potential, and education is the key to unlocking opportunities that allow this potential to flourish. By sponsoring disaster people, you are providing marginalised children with essential tools that will empower them to change their reality and create a better and brighter future, not only for themselves and their families but also for their communities as a whole.</p>
    </div>
</section>


<!-- Icons Section -->
<section class="icons">
    <div class="icon-item">
        <img width="64" height="64" src="https://img.icons8.com/external-photo3ideastudio-solid-photo3ideastudio/64/external-flood-natural-disaster-photo3ideastudio-solid-photo3ideastudio-1.png" alt="external-flood-natural-disaster-photo3ideastudio-solid-photo3ideastudio-1"/>        <p>Flood</p>
    </div>
    <div class="icon-item">
        <img width="100" height="100" src="https://img.icons8.com/carbon-copy/100/winter.png" alt="winter"/>        <p>Winter wave</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/customer-service.png')}}" alt="Disability-Support">
        <p>Disability Support</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/patient.png')}}" alt="patient">
        <p>Health Support</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/social-care.png')}}" alt="Education Materials">
        <p>Assistive Device</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/sports.png')}}" alt="Quality Education">
        <p>Sports Equepments</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/graduation-cap.png')}}" alt="Co-curricular Activities">
        <p>Education</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/healthy-food.png')}}" alt="Nutritious Food">
        <p>Nutritious Food</p>
    </div>
</section>

<!-- Support Us Form Section -->
<section class="sponsorship-form">
    <h3 style="color: black;">Support Us Form</h3>
    <form action="{{ route('support.store') }}" method="post">
        @csrf
        <label for="name">Name*</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone*</label>
        <input type="text" id="phone" name="support_number" required>

        <label for="email">Email*</label>
        <input type="email" id="email" name="email" required>

        <label for="description">What type of support you need*</label>
        <textarea id="description" name="support_type" rows="4" required></textarea>

        <label for="description">Why you need support*</label>
        <textarea id="description" name="support_reason" rows="4" required></textarea>

        <button type="submit" class="submit-button btn-success">Submit</button>
    </form>
</section>

@endsection
