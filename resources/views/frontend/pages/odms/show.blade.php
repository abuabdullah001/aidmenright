@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>



@php
    $odms=App\Models\Odms::all();
@endphp

<section style="background-color: rgb(255, 255, 255);">

    <div class="container" style="margin-top: ;">
        <h1 style="margin-left: 300px; margin-top:0px;margin-bottom:30px">ODMS</h1>
        @foreach ($odms   as $odms )
        <div class="col-md-8" style="padding: 20px">
            <img src="{{ asset(  $odms->image) }}" style="height: 400px; width: 100%;" alt="Blog Image">
                <h3>{{ Str::limit(str_replace('<p>', '', str_replace('</p>', '', $odms->title ?? 'Default Title')), 100) }}</h3>
                <p>{{ Str::limit(str_replace('<p>', '', str_replace('</p>', '', $odms->descrition ?? 'Default Description')), 5000) }}</p>
        </div>
        @endforeach

      </div>
</section>




@endsection
