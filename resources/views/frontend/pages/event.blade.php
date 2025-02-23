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
        <h1>Event</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<style>
    .card {
        width: 100%; /* Make it responsive */
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        height: 394px;
    }

    .card-img-top {
        height: 230px; /* Set fixed height for image */
        object-fit: cover; /* Ensures image covers the container without distortion */
    }

    .col-md-4 {
        padding-top: 28px;
    }

    .card-title {
        font-size: 21px;
        font-weight: 600;
        line-height: 25px;
        margin-bottom: 20px;
        color: blue;
    }
</style>

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container" style="width: 1154px">
        <h3 class="text-center ">Current Event</h3>
<hr>
        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($projects as $project)
                            <div class="col-md-3 col-sm-6 mb-4" style="margin-bottom: 20px;"> <!-- col-md-4 ensures 3 cards per row -->
                                <div class="card" style="margin-bottom:20px">
                                    <a href="{{ route('event.show', ['slug' => $project->slug]) }}">
                                        <img src="{{ asset($project->image)}}" style="width:35rem;height: 23rem;" class="card-img-top img-responsive" alt="...">
                                        <div class="card-body" style="margin-bottom: 20px">
                                            <h5 class="card-title" style="font-size: 21px;font-weight: 600;line-height: 25px;margin-bottom: 38px;">     {{ Str::limit($project->name, 20, '...') }} </h5>

                                            <a href="{{ route('champaign.show', ['slug' => $project->slug]) }}" class="" style="color:blue">Read More</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@php
 $completedchmapin = App\Models\Event::where('type','complite')->get();
@endphp
<section class="brows-job-category">
    <div class="container" style="width: 1154px">
        <h3 class="text-center ">Completed Event</h3>
        <hr>
        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($completedchmapin as $project)
                            <div class="col-md-3 col-sm-6 mb-4"> <!-- col-md-4 ensures 3 cards per row -->
                                <div class="card">
                                    <a href="{{ route('event.show', ['slug' => $project->slug]) }}">
                                        <img src="{{ asset($project->image)}}" style="width:35rem;height: 23rem;" class="card-img-top img-responsive" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ Str::limit($project->name, 30, '...') }} <!-- Limit the title to 30 characters -->
                                            </h5>
                                            <a href="{{ route('event.show', ['slug' => $project->slug]) }}" class="btn btn-link" style="color:blue">
                                                Read More
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== Begin: Brows job Category End ===============  -->
@endsection

