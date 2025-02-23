@extends('frontend.masterTemp')

@section('fmenuname')
HOME
@endsection

@section('front-main-content')

<style>
    .card-body {
    padding: 0px;
    }
</style>

<section class="inner-header-title"
    style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h1 style="text-align: center;margin-top:30px">GALLERY</h1>
    </div>
</section>

<div class="clearfix"></div>
<br><br>

<!-- Fetch Categories -->
@php
    $mediaCategories = App\Models\MediaCategory::all();
@endphp

<!-- Category Buttons -->
<div class="container text-center mb-4">
    <div class="btn-group" role="group" aria-label="Category Buttons">
        {{-- <button class="btn btn-success filter-btn" data-category="all">All</button> --}}
        <button class="btn btn-success filter-btn"  data-category='all'>
            All
        </button>
        @foreach($mediaCategories as $mediaCategory)
            <button class="btn btn-success filter-btn" data-category="{{ $mediaCategory->id }}">
                {{ $mediaCategory->name }}
            </button>
        @endforeach
    </div>
</div>

<!-- Gallery Section -->
<div class="container">
    <div class="row" id="galleryContainer">
        @foreach($galleriImages as $gallery)
            <div class="col-md-3 gallery-item" data-category="{{ $gallery->media_category_id }}">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3>{{ $gallery->mediaCategory->name ?? '' }}</h3>
                             <img src="{{ asset('/uploads/gallery/' . $gallery->images) }}" class="img-thumbnail"
                             style="width: 100%; height: 200px; object-fit: cover;"
                             alt="{{ $gallery->mediaCategory->name ?? 'Gallery Image' }}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

<script>
    // JavaScript to filter gallery items by category
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const category = button.getAttribute('data-category');

                // Debugging logs
                console.log("Selected Category:", category);

                galleryItems.forEach(item => {
                    // Show item if it matches the category or if 'all' is selected
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Highlight active button
                buttons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });
    });
</script>











{{-- main code --}}
{{--


@extends('frontend.masterTemp')
@section('fmenuname')
HOME
@endsection
@section('front-main-content')


{{-- <style type="text/css">
    .grid-view.brows-job-lis {
        position: relative;
        text-align: center;
        padding-bottom: 0;
        margin-bottom: 45px;
    }
    .brows-job-lis {
        display: table;
        width: 100%;
        clear: both;
        padding: 15px 0;
        padding-bottom: 15px;
        margin-bottom: 15px;
        transition: .4s;
        border: 1px solid #eaeff5;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 0 10px 0 rgba(88, 96, 109, .14);
        -webkit-box-shadow: 0 0 10px 0 rgba(88, 96, 109, .14);
        -moz-box-shadow: 0 0 10px 0 rgba(88, 96, 109, .14);
    }
</style> --}}
{{--
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title"
    style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h1>GALLERY</h1>
    </div>
</section>
<div class="clearfix"></div>

<div class="section mt-3">
    <div class="d-flex gap-2">
        <!-- Dropdown select -->
        <select class="form-select" style="width:100px; height:70px;" onchange="highlightButton(this)">
            <option value="">Select an option</option>
            <option value="winter">Winter</option>
            <option value="summer">Summer</option>
            <option value="flood">Flood</option>
            <option value="all">All</option>
        </select>

        <!-- Buttons -->
        <button class="btn btn-success" id="winterButton" style="width:50px;">W</button>
        <button class="btn btn-success" id="summerButton" style="width:50px;">S</button>
        <button class="btn btn-success" id="floodButton" style="width:50px;">F</button>
        <button class="btn btn-success" id="allButton" style="width:50px;">A</button>
    </div>
</div>



<!-- Title Header End -->
<br><br>
<div class="container">
    <div class="i-box">
        <div class="i-head">
            <div class="i-body">
                <div class="row">
                    @foreach($galleriImages as $gallery)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">

                                  @php
                                  $mediaCategories= App\Models\MediaCategory::all();
                                  @endphp


                                  <h3>{{$gallery->mediaCategory->name ?? null}}</h3>

                                    <img src="{{ asset('/uploads/gallery/'.$gallery->images) }}" width="100%" class="img-thumbnail" style="width: 100%; height: 300px; object-fit: cover;" alt="...">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<section class="brows-job-category"> --}}


    {{-- <div class="container">
        @if( count($galleriImages) == 0)
        <h1 class="text-center opacity-3">There are no image found !</h1>
        @else
        <div class="row">
            @foreach($galleriImages as $gallery)
            <div class="col-md-4">
                        <img width="100%" src="{{ asset('/uploads/gallery/'.$gallery->images)}}"  alt="" />

            </div>
            @endforeach
        </div>
        @endif
    </div> --}}

{{--
</section>


@endsection

<script>
    function highlightButton(select) {
        // Remove 'active' class from all buttons
        document.querySelectorAll('.btn').forEach(btn => btn.classList.remove('active'));

        // Add 'active' class to the selected button
        if (select.value) {
            document.getElementById(select.value + 'Button').classList.add('active');
        }
    }
</script> --}}




