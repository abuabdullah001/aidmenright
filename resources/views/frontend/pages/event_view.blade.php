
@extends('frontend.masterTemp')
@section('fmenuname')
    Project
@endsection
@section('front-main-content')
    <div class="clearfix" style="margin-bottom: 96px;"></div>


    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }

            span {
                color: black;
            }

            ul {
                padding-left: 49px;
            }

            p {
                color: black;
            }
        }

        .section-title {
            display: flex;
            align-items: center;
            text-align: center;
            font-size: 18px;
            color: #000;
            width: 50%;
            /* Set the text color */
        }

        .section-title::before,
        .section-title::after {
            content: "";
            flex-grow: 1;
            height: 1px;
            background-color: #000;
            /* Set the line color */
            margin: 0 10px;
        }

        .card {
            height: 394px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

        }

        .col-md-4 {
            padding-top: 28px;
        }
    </style>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <img style="width: 100%;border-radius:20px" src="{{ asset($project->image) }}"
                        alt="{{ $project->alt ?? 'ability' }}">
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>{{ $project->name }}</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {!! $project->desc !!}
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h3>Needed Donation: <span style="color:green"> {!! $project->donation_amount !!} </span></h3>
                    </div>
                </div>



                <h3>  Collected Donation: <span style="color:green">   {{ $project->event->sum('paid_amount') }}  </span> </h3>


                {{-- registration --}}

                <form action="{{ route('eventAmount.store') }}" method="POST">
                    @csrf
                    <div class="container">
                        <!-- Section for Non-Registered Users -->
                        <div id="non-registered" class="col-md-6" style="display: none;">
                            <h3>Without Registration</h3>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" id="phone" name="event_id" value="{{ $project->id}}" class="form-control" hidden>
                            </div>
                            <div class="form-group mb-3">
                                <label for="paid_amount" class="form-label">Paid Amount</label>
                                <input type="number" id="paid_amount" name="paid_amount" class="form-control">
                            </div>
                            <button class="btn btn-success">Donate</button>
                        </div>
                    </form>

                    <style>
                        button.btn.btn-success{
                            margin-bottom: 20px;
                        }
                    </style>

                    <form action="{{ route('eventAmount.store') }}" method="POST">

                        @csrf

                        <div id="registered" class="col-md-6" style="display: none;">
                            <h3>Without Registration</h3>
                            <div class="form-group mb-3">
                                <input type="number" id="paid_amount" name="paid_amount" class="form-control">

                                <label for="paid_amount_reg" class="form-label">Paid Amount</label>
                            </div>
                            <button class="btn btn-success mt-3 mb-3">Donate</button>
                        </div>
                    </div>
                </form>

                <!-- Section for Registered Users -->
                <button id="btn-registered" class="btn btn-primary mt-4">Donate Without Registration </button>

                <button id="btn-non-registered" class="btn btn-primary mt-4">Donate With Registration </button>

                <button class="btn btn-primary" style="margin-left: 10px"><a href="{{route('manual.create')}}"> <span style="color: white">Manual payment</span>
                </a> </button>

                {{-- registration --}}




            </div>

        </div>
        </div>
        <br><br>
        <div class="col-md-12" style="display: flex;justify-content:center">
            <div class="section-title">
                Read More Completed Projects
            </div>
        </div>
        <br><br>

        <div class="row">
            <div class="col-md-12" style="padding: 0px 80px;">
                @foreach ($projects as $project)
                    <div class="col-md-4">
                        <div class="card">
                            <a href="{{ route('event.show', ['slug' => $project->slug]) }}">
                                <img src="{{ asset($project->image) }}" style="width:35rem;height: 23rem;"
                                    class="card-img-top img-responsive" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="font-size: 21px;font-weight: 600;line-height: 25px;margin-bottom: 38px;">
                                        {{ Str::limit($project->name, 20, '...') }} </h5>
                                    <a href="{{ route('event.show', ['slug' => $project->slug]) }}" class=""
                                        style="color:blue">Read More »</a>
                                </div>
                            </a>
                        </div>

                        <!-- <div class="col-md-4">
                    <div class="card">
                        <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ URL::to('/') }}/frontend_assets/assets/img/demo2.png" style="width:35rem" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div> -->
                
                    </div>
                @endforeach
            </div>
    </section>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get buttons and forms
        const btnNonRegistered = document.getElementById("btn-non-registered");
        const btnRegistered = document.getElementById("btn-registered");
        const nonRegisteredForm = document.getElementById("non-registered");
        const registeredForm = document.getElementById("registered");

        // Event listener for "Without Registration Donate" button
        btnNonRegistered.addEventListener("click", function() {
            nonRegisteredForm.style.display = "block"; // Show the non-registered form
            registeredForm.style.display = "none"; // Hide the registered form if visible
        });

        // Event listener for "With Registration Donate" button
        btnRegistered.addEventListener("click", function() {
            registeredForm.style.display = "block"; // Show the registered form
            nonRegisteredForm.style.display = "none"; // Hide the non-registered form if visible
        });
    });
</script>
