@extends('frontend.masterTemp')

@section('front-main-content')
    <style>
        .containers {
            text-align: center;
            display: flex;
            justify-content: center;
            padding: 130px;
            background: black;
        }

        .donation-section {
            display: flex;
            /* background: linear-gradient(rgb(31, 67, 149), rgb(239, 49, 158)); */
            background: white;
            border-radius: 10px;
            padding: 20px;
            max-width: 1000px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%; /* Ensure it takes full width */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        .image-container {
            flex: 1;
            padding-right: 20px;
            margin-top: 100px;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 15px;
            border: 3px solid #ffd700;
        }

        .donation-options {
            flex: 1.3;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .donation-options h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color:black;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left; /* Align labels and inputs to the left */
        }

        .form-group label {
            color: black; /* Label color */
            display: block; /* Make labels block for better spacing */
            margin-bottom: 8px; /* Space between label and input */
        }

        .donate-btn {
            /* background: linear-gradient(rgb(31, 67, 149), rgb(31, 67, 149));  */
            color: black; /* Text color for better contrast */
            padding: 15px 30px;
            border: none;
            border-radius: 30px; /* Rounded corners for buttons */
            cursor: pointer;
            font-size: 1.2em;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        @media (max-width: 767px) {
            .containers {
                padding: 50px 10px; /* Reduce padding on smaller screens */
            }

            .donation-section {
                flex-direction: column; /* Stack items vertically on small screens */
                align-items: center; /* Center items */
                padding: 15px; /* Adjust padding for mobile */
            }

            .image-container {
                margin-top: 20px; /* Adjust margin for smaller screens */
                padding-right: 0; /* Remove right padding */
            }

            .donation-options {
                width: 100%; /* Ensure full width for options */
            }

            .donation-options h2 {
                font-size: 1.5em; /* Slightly smaller heading on mobile */
            }

            .form-group {
                margin-bottom: 15px; /* Adjust margin for mobile */
            }

            .donate-btn {
                width: 100%; /* Full width button on mobile */
                padding: 12px; /* Adjust button padding for mobile */
                font-size: 1em; /* Adjust font size for mobile */
            }
        }

        .donate-btn:hover {
            background: linear-gradient(135deg, rgb(239, 49, 158), rgb(31, 67, 149));
        }
    </style>

<div class="containers mt-3">
    <div class="donation-section">
        <div class="image-container mt-5">
            <img src="{{ asset('child-imag.jpg') }}" alt="Smiling Child">
        </div>
        <div class="donation-options">
            <h2 class="text-uppercase">Contribute any amount to support the well-being of disaster people</h2>

            <form action="{{ route('pay') }}" method="POST">
                @csrf <!-- CSRF token for security -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter your Phone" required>
                </div>

                <div class="form-group">
                    <label for="donation_amount">Donation Amount</label>
                    <input type="text" id="donation_amount" name="donation_amount" class="form-control" value="{{ $donationAmount }}" readonly> <!-- Displaying the session value -->
                </div>

                <div class="form-check d-flex text-left" style="color: white;">
                    <input type="checkbox" class="form-check-input" id="privacy_policy" name="privacy_policy" required>
                    <label class="form-check-label" for="privacy_policy">
                        I agree to the
                        <a href="/privacy" target="_blank" style="color: rgb(39, 222, 228);">Privacy Policy</a>,
                        <a href="/terms" target="_blank" style="color: rgb(87, 184, 22);">Terms of Service</a>
                        and
                        <a href="/return" target="_blank" style="color: rgb(255, 251, 4);">Return Policy</a>
                    </label>
                </div>

                <div class="text-center">
                    <button type="submit" class="donate-btn">Submit</button>
                    <button class="btn btn-info" style="margin-left: 10px"><a href="{{route('manual.create')}}">Manual payment </a> </button>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection
