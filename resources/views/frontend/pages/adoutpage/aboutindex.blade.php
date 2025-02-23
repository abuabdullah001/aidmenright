@extends('frontend.masterTemp')

@section('fmenuname')
    {{ App\Models\Category::where('id', $pagename)->pluck('title')->first() }}
@endsection

@section('front-main-content')

    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            /* Light background for better contrast */
            margin: 0;
            padding: 0;
        }

        /* Inner header styles */
        .inner-header-title {
            padding: 50px 0;
            color: white;
            text-align: center;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .inner-header-title h1 {
            font-size: 2.5rem;
            /* Responsive title size */
        }

        /* Member list section */
        .member-list {
            padding: 40px 0;
        }

        .card {
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 90%;
            /* Reduce card width to 90% */
            max-width: 300px;
            /* Set maximum width to 300px */
            margin: 0 auto;
            margin-top: 50px;
            /* Center cards in the column */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            width: 100%;
            padding: 5px;
            object-fit: contain;
            /* Change to cover for better image presentation */
        }

        .card-body {
            padding: 20px;
            background-color: white;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 10px;
            color: #555;
        }

        /* Button styles */
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1rem;
            color: white;
            /* Text color for button */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        /* Custom gap between rows */
        .gap-between-rows {
            margin-bottom: 50px;
            /* Adjust the value as needed for the desired gap */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .inner-header-title h1 {
                font-size: 1.75rem;
            }

            .card {
                margin-bottom: 20px;
            }

            .member-list .row {
                display: flex;
                flex-wrap: wrap;
                /* Wrap cards in smaller screens */
                margin-bottom: 20px;
                /* Add gap between rows */
            }

            .member-list .col-md-4 {
                flex: 1 1 100%;
                /* Stack cards on small screens */
                margin-bottom: 20px;
                /* Spacing between stacked cards */
            }
        }
    </style>

    <div class="clearfix"></div>

    <!-- Title Header Start -->

    <section class="inner-header-title"
        style="background-image:url(https://www.pngkey.com/png/full/666-6663236_blue-header-png-6-png-image-blue.png);">
        <div class="container" style="margin-top: 30px">

            <h1>{{ App\Models\Category::where('id', $pagename)->pluck('title')->first() }}</h1>
        </div>
    </section>

    <div class="clearfix"> </div>

    @if ($pagename == 42)
        @php
            $members = App\Models\MannagementMember::all();
        @endphp

        <section class="member-list">
            <div class="container">
                <div class="row mb-4"> <!-- Add mb-4 for gap -->
                    @if ($members->isEmpty())
                        <h1 class="text-center" style="opacity: 0.5; width: 100%;"><b>Nothing Found</b></h1>
                    @else
                        @foreach ($members as $value)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-light">
                                    <img src="{{ $value->image ? asset($value->image) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                        class="card-img-top" alt="{{ $value->name }}'s Image">
                                    <div class="card-body" style="height: 300px">
                                        <h6 class="card-title"><strong>Name:</strong> {{ $value->name }}</h6>
                                        <p class="card-text"><strong>Designation:</strong> {{ $value->designation }}</p>
                                        <p class="card-text"><strong>Phone:</strong> {{ $value->phone }}</p>
                                        <p class="card-text"><strong>Email:</strong> {{ $value->email }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>

    @endif
    @if ($pagename == 45)
        @php
            $members = App\Models\Partner::all();
        @endphp

        <section class="member-list">
            <div class="container">
                <div class="row mb-4"> <!-- Add mb-4 for gap -->
                    @if ($members->isEmpty())
                        <h1 class="text-center" style="opacity: 0.5; width: 100%;"><b>Nothing Found</b></h1>
                    @else
                        @foreach ($members as $value)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-light">
                                    <img src="{{ $value->image ? asset($value->image) : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                        class="card-img-top" alt="{{ $value->name }}'s Image">
                                    <div class="card-body" style="height: 300px">
                                        <h6 class="card-title"><strong>Title:</strong> {{ $value->title }}</h6>
                                        <p class="card-text"><strong>Description:</strong> {!! $value->description !!}</p>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </section>

    @endif
    @if ($pagename == 46)
     @include('frontend.pages.report');



    @endif
    @if ($pagename == 47)
    @php
        $odms = App\Models\Odms::first();
    @endphp
    <section class="member-list">
        <div class="container">
            <div class="row mb-4"> <!-- This creates a gap between the rows -->
                <div class="col-md-12"> <!-- Full width column -->
                    <p class="card-text">{!! $odms->description !!}</p>
                </div>
            </div>
        </div>
    </section>
@endif
    @if ($pagename == 48)
    @php
    @endphp
    <section class="member-list">
        <div class="container">
           @include('frontend.pages.whatwedo')
    </section>
@endif


    <div class="clearfix"></div>

    @if (count($viewpageedit) > 0)
    <section class="full-detail-description full-detail">
        <div class="container">
            <div class="d-flex flex-column">
                @if ($pagename != 42)
                    <h1 class="detail-title text-center">
                        {{ App\Models\Category::where('id', $pagename)->pluck('title')->first() }}
                    </h1>
                @endif

                @foreach ($viewpageedit as $index => $description)
                    @if ($pagename != 42)
                        <div class="row d-flex align-items-center my-5">
                            @if ($index % 2 == 0)


                                <div class="col-md-6 text-center d-flex justify-content-center align-items-center" style="margin-top: 60px">
                                    <img src="{{ asset($description->image) }}" alt="Image" class="img-fluid" style="max-height: 400px;width:600px">
                                </div>
                                <div class="col-md-6" style="margin-top: 30px">
                            @else
                                <div class="col-md-6" style="margin-top: 30px; text-align: justify;">
                            @endif
                                    @php
                                        $contentw = $description->content;
                                        $content = html_entity_decode(strip_tags($contentw));
                                        $shortContent = Str::limit($content, 900);
                                    @endphp
                                        <h2 class="text-center" style=""> {{$description->title}}</h2>

                                        <span class="short-content">{{ $shortContent }}</span>
                                        <span class="full-content" style="display: none;">{{ $content }}</span>
                                    </h4>
                                    @if (strlen($content) > 900)
                                        <button class="btn btn-primary read-more-btn">Read More</button>
                                    @endif
                            @if ($index % 2 != 0)
                                </div>
                                {{-- <h4 style="margin-top: 50px"> {{$description->title}} </h4> --}}
                                <div class="col-md-6 text-center d-flex justify-content-center align-items-center" style="margin-top: 60px">
                                    <img src="{{ asset($description->image) }}" alt="Image" class="img-fluid" style="max-height: 400px;width:600px">
                                </div>
                            @else
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif



    <div class="clearfix"></div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.read-more-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const shortContent = this.closest('.col-md-6').querySelector('.short-content');
                const fullContent = this.closest('.col-md-6').querySelector('.full-content');

                if (shortContent.style.display === "none") {
                    shortContent.style.display = "inline";
                    fullContent.style.display = "none";
                    this.innerText = "Read More";
                } else {
                    shortContent.style.display = "none";
                    fullContent.style.display = "inline";
                    this.innerText = "Show Less";
                }
            });
        });
    });
</script>

{{--
<script>
    function toggleContent() {
        var shortContent = document.getElementById("short-content");
        var fullContent = document.getElementById("full-content");
        var btn = document.getElementById("read-more-btn");

        if (shortContent.style.display === "none") {
            shortContent.style.display = "inline";
            fullContent.style.display = "none";
            btn.innerText = "Read More";
        } else {
            shortContent.style.display = "none";
            fullContent.style.display = "inline";
            btn.innerText = "Show Less";
        }
    }
</script> --}}
