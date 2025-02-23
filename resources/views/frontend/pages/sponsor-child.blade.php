@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')
<style>
    h1,
    h2 {
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
        background-color: rgba(0, 0, 0, 0.81);
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
    .sponsorship-form {
        max-width: 757px;
        margin: 100px auto 71px auto;
        background-color: white;
        padding: 20px;
        text-align: center;
    }
    .sponsorship-form form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
    }
    .sponsorship-form label {
        font-weight: bold;
        color: black;
    }
    .sponsorship-form input {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
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
    /* Button Styling */
    .registration-button, .login-button {
        background-color: #007bff; /* Blue background */
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 5px;
    }
    .registration-button:hover, .login-button:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
    .registration-button:active, .login-button:active {
        background-color: #004085; /* Even darker blue when clicked */
        transform: scale(0.98); /* Slightly shrink the button when clicked */
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
        <h2 style="font-weight: 49px; font-weight: 600; color:white;">
            Contribute any amount to support people's in disaster affected area
        </h2>
        <p style="color: white; text-align: center;">
            Within every disaster people lies boundless potential, and education is
            the key to unlocking opportunities that allow this potential
            to flourish. By sponsoring a disaster people, you are providing
            marginalised people with essential tools that will empower
            them to change their reality and create a better and
            brighter future, not only for themselves and their families
            but also for their communities as a whole.
        </p>
    </div>
</section>

<!-- Donation Amount Section -->
<section class="donation-amount">
    <h2>Monthly-Yearly-OneTime</h2>
</section>

<!-- Icons Section -->
<section class="icons">
    <div class="icon-item">
        <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/storm--v1.png" alt="storm--v1"/>
        <p>Flood</p>
    </div>
    <div class="icon-item">
        <img width="100" height="100" src="https://img.icons8.com/carbon-copy/100/winter.png" alt="winter"/>
        <p>Winter wave</p>
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
        <img src="{{asset('frontend_assets/assets/icon/social-care.png')}}"
            alt="Education Materials">
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

<!-- Sponsorship Form Section -->
<section class="sponsorship-form">
    <h3>Sponsor Form</h3>

    <!-- Buttons for registration options -->
    <div style="margin-bottom: 15px; text-align: center;">
        <button type="button" id="with-registration-btn" class="registration-button">With Registration</button>
        <button type="button" id="without-registration-btn" class="registration-button">Without Registration</button>
        <button type="button" id="login-btn" class="login-button">Login</button>
    </div>

    <!-- With Registration Form -->
    <div id="with-registration-form" style="display: none;">
        <h4>With Registration</h4>
        <form action="{{Route('donate.store')}}" method="post">
            @csrf

            <label for="first-name">Name*</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last-name">Company Name</label>
            <input type="text" id="last_name" name="last_name" >
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required>
            <label for="number">Contact Number</label>
            <input type="number" id="number" name="number" required>
            <label>Sponsor Amount*</label>
            <input type="text" name="sponsor_number" required>
            <label for="contribution_type">Preferred Interval for needed*</label>
            <select name="contribution_type" id="contribution_type" class="form-control" required>
                <option value="">--None--</option>
                <option value="Monthly">Monthly</option>
                <option value="quarterly">Quarterly</option>
                <option value="Half Yearly">Half Yearly</option>
                <option value="Yearly">Yearly</option>
            </select>
            <label for="password">Password*</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <!-- Without Registration Form -->
    <div id="without-registration-form" style="display: none;">
        <h4>Without Registration</h4>
        <form action="{{Route('donate.store')}}" method="post">
            @csrf
            <label for="first-name">Name*</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last-name">Company Name</label>
            <input type="text" id="last_name" name="last_name" >
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required>
            <label for="number">Contact Number</label>
            <input type="number" id="number" name="number" required>
            <label>Sponsor Amount*</label>
            <input type="text" name="sponsor_number" required>
            <label for="contribution_type">Preferred Interval for needed*</label>
            <select name="contribution_type" id="contribution_type" class="form-control" required>
                <option value="">--None--</option>
                <option value="Monthly">Monthly</option>
                <option value="quarterly">Quarterly</option>
                <option value="Half Yearly">Half Yearly</option>
                <option value="Yearly">Yearly</option>
            </select>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <!-- Login Form -->
    <div id="login-form" style="display: none;">
        <h4>Login</h4>
        <form class="billing-form"  method="post" action="{{ route('login') }}" >
            @csrf
            <div class="row" style="margin: 0 ; padding: 0" >
                <div class="col-xs-12">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
                    @error('email')
                    <div class="alert alert-danger" style="padding: 0;">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row" style="margin: 0 ; padding: 0">
                <div class="col-xs-12">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password"/>
                    @error('password')
                    <div class="alert alert-danger" style="padding: 0;">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 text-center mrg-top-25">
                    <button type="submit" class="btn btn-success">LogIn</button>
                </div>

            </div>
        </form>
    </div>
</section>

<script>
    // Function to hide all forms
    function hideAllForms() {
        document.getElementById('with-registration-form').style.display = 'none';
        document.getElementById('without-registration-form').style.display = 'none';
        document.getElementById('login-form').style.display = 'none';
    }

    // Show With Registration Form
    document.getElementById('with-registration-btn').addEventListener('click', function() {
        hideAllForms();
        document.getElementById('with-registration-form').style.display = 'block';
    });

    // Show Without Registration Form
    document.getElementById('without-registration-btn').addEventListener('click', function() {
        hideAllForms();
        document.getElementById('without-registration-form').style.display = 'block';
    });

    // Show Login Form
    document.getElementById('login-btn').addEventListener('click', function() {
        hideAllForms();
        document.getElementById('login-form').style.display = 'block';
    });
</script>
@endsection
