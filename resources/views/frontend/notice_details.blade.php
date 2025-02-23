@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>

@php
    $notices = App\Models\Notice::take(3)->get(); // Fetch multiple notices
@endphp


<section style="background-color: rgb(255, 255, 255);">
    <div class="container">
        <div class="row">
            <h1 style="margin-left: 470px; margin-top:0px;margin-bottom:30px">Notice</h1>
        </div>


            <div class="">
                {{-- <h3>{{ Str::limit(strip_tags($notice->title ?? 'Default Title'), 100) }}</h3> --}}
                <p>{{ (strip_tags($notice->descriptino ?? 'Default Description')) }}</p>
            </div>

    </div>
</section>
@endsection
