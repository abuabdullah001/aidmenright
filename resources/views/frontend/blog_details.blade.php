@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>


{{-- Blog --}}

@php
    $blogs=App\Models\Blog::all();
@endphp

<section style="background-color: rgb(255, 255, 255);">

    <div class="container" style="margin-top: ;">
        <h1 style="margin-left: 300px; margin-top:0px;margin-bottom:30px">BLOG</h1>


        <div class="col-md-8" style="padding: 20px">

            <img src="{{ asset('images/post/' . $blog->image) }}" style="height: 400px; width: 100%;" alt="Blog Image">

                <div class="row" style="padding: 15px">
                <p style="float:left;">{{$blog->name}}</p>
                <p style="float: right">{{$blog->date}}</p>
                </div>
                <h3>{{ Str::limit(str_replace('<p>', '', str_replace('</p>', '', $blog->title ?? 'Default Title')), 100) }}</h3>
                <p>{{ Str::limit(str_replace('<p>', '', str_replace('</p>', '', $blog->description ?? 'Default Description')), 5000) }}</p>
        </div>
      </div>
</section>

<hr><hr>


<section style="background-color: white; padding: 20px;">
    <h1 style="text-align: center; margin-bottom: 20px;">All Blogs</h1>

    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4" style="margin-bottom: 20px;">
                    <div style="padding: 10px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 5px;">
                    <!-- Blog Image -->
                    <img src="{{ asset('images/post/' . $blog->image) }}"
                         style="height: 300px; width: 100%; object-fit: cover;"
                         alt="Blog Image">

                    <!-- Blog Details -->

                        <!-- Blog Name and Date -->
                        <div class=" row" style="padding: 20px">
                            <p style="margin: 0; font-weight: bold;float: left;">{{ $blog->name }}</p>
                            <p style="margin: 0; font-size: 0.9em; color: gray;float: right;">{{ $blog->date }}</p>
                        </div>
                        <!-- Blog Title -->
                    <h3>   {{ Str::limit(strip_tags($blog->title ?? 'Default Title'), 100) }}   </h3>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</section>





@endsection
