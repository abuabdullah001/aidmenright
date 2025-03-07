@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h1 style="color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Terms and condition</h1>
    </div>
</section>
<div class="clearfix"></div>

<style>
    .card {
        border: none; /* Remove default border */
        border-radius: 10px; /* Rounded corners */
        overflow: hidden; /* Ensure child elements are contained */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
        background-color: #fff; /* White background for card */
    }

    .card:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 12px; /* Shadow on hover */
    }

    .card-img-top {
        height: 200px; /* Fixed height for images */
        object-fit: cover; /* Cover the card while preserving aspect ratio */
    }

    .card-body {
        padding: 20px; /* Padding for content */
    }

    .card-title {
        font-size: 1.5em; /* Increased font size for titles */
        margin-bottom: 10px; /* Space below title */
        color: #333; /* Dark text color */
    }

    .card-text {
        color: #666; /* Lighter text color for description */
    }

    .card-footer {
        background-color: #f8f9fa; /* Light background for footer */
        border-top: 1px solid #e9ecef; /* Top border */
        padding: 10px 20px; /* Padding for footer */
        text-align: center; /* Center align footer content */
    }

    .btn-primary {
        background-color: rgb(31, 67, 149); /* Custom primary button color */
        border: none; /* Remove border */
        padding: 10px 20px; /* Padding for button */
        border-radius: 5px; /* Rounded corners */
        transition: background-color 0.3s ease; /* Smooth background transition */
    }

    .btn-primary:hover {
        background-color: rgb(239, 49, 158); /* Hover effect for button */
    }

    .brows-job-category {
        padding: 40px 0; /* Vertical padding for the section */
    }
</style>
@php
$privacy = App\Models\Privacy::where('type', 'terms_conditions')->get(); // Use first() instead of get() to get a single entry

@endphp
<!-- ========== Begin: Browse Job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    @foreach($privacy as $item)
                    <div class="col-md-12 mb-4"> <!-- Margin bottom for spacing -->
                        <div class="">
                            <div class="">
                                <p class="card-text">{!! html_entity_decode(($item->desc)) !!}</p>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== End: Browse Job Category ===============  -->
@endsection
