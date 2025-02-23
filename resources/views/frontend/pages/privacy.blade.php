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
        <h1 style="color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">PRIVACY POLICY</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<style>
    .card {
        border: none; /* Remove default border */
        border-radius: 10px; /* Rounded corners */
        overflow: hidden; /* Ensure child elements are contained */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transitions */
        background-color: #fff; /* White background for card */
        max-width: 350px; /* Set a maximum width for cards */
        margin: auto; /* Center cards horizontally */
    }

    .card:hover {
        transform: translateY(-5px); /* Lift effect on hover */
        box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 12px; /* Shadow on hover */
    }

    .card-body {
        padding: 20px; /* Padding for content */
    }

    .card-text {
        color: #666; /* Lighter text color for description */
    }

    .brows-job-category {
        padding: 40px 0; /* Vertical padding for the section */
    }
</style>

@php
$privacy = App\Models\Privacy::where('type', 'privacy_policy')->get(); // Get privacy policy entries
@endphp

<!-- ========== Begin: Browse Job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div class="ibox">
            <div class="i-body">
                <div class="row justify-content-center"> <!-- Centering the cards -->
                    @foreach($privacy as $item)
                    <div class="col-md-12 mb-4"> <!-- Adjust column size -->
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
