@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')
<div class="clearfix"></div>



{{-- Blog --}}

 @php
    $blogs=App\Models\Blog::take(3)->get();
@endphp


<style>
        .hover-ca {
        background-color: #F0F4F5;
        position: relative; /* To allow absolute positioning of text */
        height: 450px;
        width: 350px;
        margin: 10px ;
        margin-left: 30px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth zoom & shadow */
    }

    .hover-ca:hover {
        transform: scale(1.05); /* Slightly enlarge the card */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Add a shadow effect */
    }
</style>


<section style="background-color: rgb(255, 255, 255);">


    <div class="container" style="margin-top: ;">
        <div row>
        <h1 style="margin-left: 470px; margin-top:0px;margin-bottom:30px">BLOG</h1>
        <button class="btn btn-success mb-3" style="margin-bottom:20px;margin-left:20px"><a href="{{route('blog.create')}}"> Create blog</a></button>
        </div>
        @foreach ($blogs as $blog )
        <div class="col-md-3 hover-ca" style="padding: 20px">

            <img src="{{ asset('images/post/' . $blog->image) }}" style="height: 200px; width: 100%;" alt="Blog Image">
                <div class="row" style="padding: 15px">
                <p style="float:left;">{{$blog->name}}</p>
                <p style="float: right">{{$blog->date}}</p>
                </div>
                <h3>{{ Str::limit(str_replace('<p>', '', str_replace('</p>', '', $blog->title ?? 'Default Title')), 100) }}</h3>
            <h3><a href="{{route('blog_details',$blog->id)}}">Read more...</a></h3>
        </div>

        @endforeach
    </div>
 </section>

 <hr>


 @php
 $blogs=App\Models\Blog::all();
@endphp


<h1 style="text-align:center;">See all blog</h1>
<section style="background-color: rgb(255, 255, 255);">
    <div class="container" style="margin-top: ;">
        @foreach ($blogs as $blog )
        <div class="col-md-3 hover-ca" style="padding: 20px">
            <img src="{{ asset('images/post/' . $blog->image) }}" style="height: 200px; width: 100%;" alt="Blog Image">
                <div class="row" style="padding: 15px">
                <p style="float:left;">{{$blog->name}}</p>
                <p style="float: right">{{$blog->date}}</p>
                </div>
                <h3>{{ Str::limit(str_replace('<p>', '', str_replace('</p>', '', $blog->title ?? 'Default Title')), 100) }}</h3>
            <h3><a href="{{route('blog_details',$blog->id)}}">Read more...</a></h3>
        </div>

        @endforeach
    </div>
 </section>









@endsection
