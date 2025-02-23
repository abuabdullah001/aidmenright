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
        background:white; /* Red to Blue gradient */
        border-radius: 10px; /* Optional: to add rounded corners */
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
        background-color: green;
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



<!-- Hero Section -->
<section class="hero">
    <div class="overlay">
        <h2 style="font-weight: 600;color:white;">Help a disaster people for their future</h2>
        <p style="color: white;text-align: center;">Within every disaster people lies boundless potential, and education is the key to unlocking opportunities that
            allow this potential to flourish. By sponsoring a child, you are providing marginalized children with essential tools that will empower them to change their
            reality and create a better and brighter future, not only for themselves and their families but also for their communities as a whole.</p>
    </div>
</section>

<!-- Icons Section -->
<section class="icons">
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/coach.png')}}" alt="Teacher">
        <p>Coach</p>
    </div>
    <div class="icon-item">
        <img src="{{asset('frontend_assets/assets/icon/american-football-player.png')}}" alt="Sports-Geares">
        <p>Sports Geares</p>
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
    <h3 style="color: black;">Custom Gift Form</h3>
    <form action="{{ route('physicalgifts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <label for="name">Name*</label>
        <input type="text" id="name" name="name" required>

        <!-- Phone -->
        <label for="phone">Phone*</label>
        <input type="text" id="phone" name="phone" required>

        <!-- Address -->
        <label for="address">Address</label>
        <input type="text" id="address" name="address">

        <!-- Image -->
        <label for="image">Image (optional)</label>
        <input type="file" id="image" name="image">

        <!-- Donation Type -->
        <label for="what_will_donate">What will you donate?*</label>
        <textarea id="what_will_donate" name="what_will_donate" rows="4" required></textarea>

        <!-- Donation Method -->
        <label for="how_he_will_donate">How will you donate?*</label>
        <textarea id="how_he_will_donate" name="how_he_will_donate" rows="4" required></textarea>

        <!-- Comment -->
        <label for="comment">Comment</label>
        <textarea id="comment" name="comment" rows="4"></textarea>

        <!-- Submit Button -->
        <button type="submit" class="submit-button">Submit</button>
    </form>
</section>

@endsection
