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
                <img style="width: 100%;border-radius:20px" src="{{ asset( $project->image) }}"
                    alt="{{ $project->alt ?? 'ability' }}">
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>{{$project->name}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $project->desc !!}
                </div>
            </div>

        </div>
    </div>
    <br><br>
 
    <br><br>



</section>
@endsection
