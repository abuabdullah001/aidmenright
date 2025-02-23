@extends('frontend.masterTemp')

@section('fmenuname')
SEARCH RESULTS
@endsection

@section('front-main-content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(https://user-images.githubusercontent.com/513929/53929982-e5497700-404c-11e9-8393-dece0b196c98.png);">
    <div class="container">
        <h1>Search Results for: {{ $query }}</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<style>
    .card {
        width: 100%; /* Ensure card takes the full width of the column */
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        height: 394px;
        position: relative; /* Required for absolute positioning of the label */
    }
    .col-md-3 {
        padding-top: 28px;
    }
    .card-img-top {
        height: 230px; /* Adjust as necessary */
        object-fit: cover; /* Ensure the image fits within the card without distortion */
    }
    .result-type {
        position: absolute;
        top: 10px; /* Adjust as necessary */
        left: 10px; /* Adjust as necessary */
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px; /* Adjust font size as needed */
    }
    /* Adding spacing for rows */
    .row {
        margin-bottom: 20px; /* Adjust this value as needed for desired spacing */
    }
</style>

<!-- Search Results Section -->
<section class="search-results">
    <div class="container" style="width: 1154px">
        <h3 class="text-center">Search Results</h3>
        <hr>

        <div class="ibox">
            <div class="">
                <div class="row" style="gap:5%">
                    @if($projects->isEmpty() && $events->isEmpty() && $champagnes->isEmpty() && $news->isEmpty())
                        <div class="col-12 text-center">
                            <p>No results found for your search.</p>
                        </div>
                    @else
                        <!-- Display Projects -->
                        @foreach($projects as $project)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="result-type">Project</div> <!-- Type label -->
                                <a href="{{ route('project.show', ['slug' => $project->slug]) }}">
                                    <img src="{{ asset($project->image) }}" class="card-img-top img-responsive" alt="Project Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark" style="font-size: 21px; font-weight: 600; line-height: 25px; margin-bottom: 38px; color: blue;">
                                            {{ Str::limit($project->name, 20, '...') }}
                                        </h5>
                                        <a href="{{ route('project.show', ['slug' => $project->slug]) }}" style="color: blue">
                                            Read More »
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach

                        <!-- Display Events -->
                        @foreach($events as $event)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="result-type">Event</div> <!-- Type label -->
                                <a href="{{ route('event.show', ['slug' => $event->slug]) }}">
                                    <img src="{{ asset($event->image) }}" class="card-img-top img-responsive" alt="Event Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark" style="font-size: 21px; font-weight: 600; line-height: 25px; margin-bottom: 38px; color: blue;">
                                            {{ Str::limit($event->name, 20, '...') }}
                                        </h5>
                                        <a href="{{ route('event.show', ['slug' => $event->slug]) }}" style="color: blue">
                                            Read More »
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach

                        <!-- Display Champagnes -->
                        @foreach($champagnes as $champaign)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="result-type">Champaign</div> <!-- Type label -->
                                <a href="{{ route('champaign.show', ['slug' => $champaign->slug]) }}">
                                    <img src="{{ asset($champaign->image) }}" class="card-img-top img-responsive" alt="Champaign Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark" style="font-size: 21px; font-weight: 600; line-height: 25px; margin-bottom: 38px; color: blue;">
                                            {{ Str::limit($champaign->name, 20, '...') }}
                                        </h5>
                                        <a href="{{ route('champaign.show', ['slug' => $champaign->slug]) }}" style="color: blue">
                                            Read More »
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach

                        <!-- Display News -->
                        @foreach($news as $newsItem)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="result-type">News</div> <!-- Type label -->
                                <a href="{{ route('news.show', ['slug' => $newsItem->slug]) }}">
                                    <img src="{{ asset($newsItem->image) }}" class="card-img-top img-responsive" alt="News Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark" style="font-size: 21px; font-weight: 600; line-height: 25px; margin-bottom: 38px; color: blue;">
                                            {{ Str::limit($newsItem->name, 20, '...') }}
                                        </h5>
                                        <a href="{{ route('news.show', ['slug' => $newsItem->slug]) }}" style="color: blue">
                                            Read More »
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
