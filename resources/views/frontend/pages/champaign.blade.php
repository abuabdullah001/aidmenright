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
        <h1>Champaign</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<style>
    .card {
        width: 100%;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        height: 394px;
    }
    .col-md-4 {
        padding-top: 28px;
    }
    .card-img-top {
        height: 230px;
        object-fit: cover;
    }
</style>

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container" style="width: 1154px">
        <h3 class="text-center ">Running Champain</h3>
        <hr>

        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    @foreach($projects as $project)
                    <div class="col-md-3"> <!-- col-md-3 ensures 4 cards per row -->
                        <div class="card">
                            <a href="{{ route('champaign.show', ['slug' => $project->slug]) }}">
                                <img src="{{ asset($project->image)}}" style="width:35rem;height: 23rem;" class="card-img-top img-responsive" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 21px;font-weight: 600;line-height: 25px;margin-bottom: 38px;color:blue">     {{ Str::limit($project->name, 20, '...') }} </h5>
                                    <a href="{{ route('champaign.show', ['slug' => $project->slug]) }}" class="" style="color:blue">Read More »</a>
                                </div>
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@php
 $completedchmapin = App\Models\champaign::where('type','complite')->get();
@endphp
<section class="brows-job-category">
    <div class="container" style="width: 1154px">
        <h3 class="text-center ">Complited Champain</h3>
        <hr>

        <div class="ibox">
            <div class="i-body">
                <div class="row">
                    @foreach($completedchmapin as $projects)
                    <div class="col-md-3"> <!-- col-md-3 ensures 4 cards per row -->
                        <div class="card">
                            <a href="{{ route('champaign.show', ['slug' => $project->slug]) }}">
                                <img src="{{ asset($projects->image)}}" style="width:35rem;height: 23rem;" class="card-img-top img-responsive" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 21px;font-weight: 600;line-height: 25px;margin-bottom: 38px;color:blue">     {{ Str::limit($project->name, 20, '...') }} </h5>
                                    <a href="{{ route('champaign.show', ['slug' => $project->slug]) }}" class="" style="color:blue">Read More »</a>
                                </div>
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========== Begin: Brows job Category End ===============  -->
@endsection
