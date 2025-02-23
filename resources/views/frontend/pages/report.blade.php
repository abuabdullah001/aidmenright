@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>



  {{-- yearly report --}}

<style>
        .hover-car {
        background-color: #F0F4F5;
        position: relative; /* To allow absolute positioning of text */
        height: 430px;
        width: 350px;
        margin: 10px ;
        margin-left: 30px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth zoom & shadow */
    }
    .hover-car:hover {
        transform: scale(1.05); /* Slightly enlarge the card */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Add a shadow effect */
    }
</style>

@php
    $repo=App\Models\ReportAdd::all();
@endphp


<section style="background-color: rgb(255, 255, 255);">
    <div class="container" style=" ">
            <div class="row">
                <h1 style="margin-left: 470px; margin-top:30px;margin-bottom:30px">Report</h1>

            @foreach ($repo as $repo  )

            @endforeach
                <div class="col-md-3 hover-car" style="padding: 10px">
                    <img src="{{asset($repo->image)}}" style="height: 200px;width:100%;" alt="">
                    <h3>{{$repo->name}}</h3>
                    <p style="text-align: justify">
                        {{ strip_tags($repo->description) }}
                    </p>
                <div class="form-group">
                    <label><strong>PDF File:</strong></label><br>
                    <a href="{{ asset($repo->pdf) }}" class="btn btn-success btn-sm" download>
                        <i class="fas fa-download"></i> Download PDF
                    </a>
                </div>
                </div>

{{--
                <div class="col-md-3 hover-car "  style="padding: 10px">
                    <img src="images/1732169911-Amphan-Effected-1.jpg" style="height: 200px;width:100%;" alt="">
                <h3>Yearly report</h3>
                <p style="text-align: justify">
                    Lorem ipsum dolor sit amet consectetur o dicta, enim, harum molestias distinctio libero, exercitationem veniam hic temporibus laboriosam quisquam aut.
                </p>
                <a href="">pdf file download</a>
                </div> --}}
        </div>
    </div>
</section>





@endsection
