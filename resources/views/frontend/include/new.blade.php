<style type="text/css">
    nav.navbar.bootsnav li.dropdown ul.drop_nav {
        border-color: #07b107;
        width: 70% !important;
        margin-left: 10%;
    }

    nav.navbar.bootsnav li.dropdown ul.drop_nav_media {
        border-color: #07b107;
        width: 20% !important;
        margin-left: 20%;
    }

    nav.navbar.bootsnav li.dropdown ul.drop_nav_new {
        border-color: #07b107;
        width: 20% !important;
        margin-left: 10%;
    }

    nav.navbar.bootsnav li.dropdown ul.drop_nav {
        border-color: #07b107;
        width: 35% !important;
        margin-left: 10%;
    }

    .dropdown-menu {
        min-width: 200px;
    }

    .dropdown-menu.columns-2 {
        min-width: 400px;
    }

    .dropdown-menu.columns-3 {
        min-width: 600px;
    }

    .dropdown-menu li a {
        padding: 5px 15px;
        font-weight: 300;
    }

    .multi-column-dropdown {
        list-style: none;
    }

    .multi-column-dropdown li a {
        display: block;
        clear: both;
        line-height: 1.428571429;
        color: #333;
        white-space: normal;
    }

    .multi-column-dropdown li a:hover {
        text-decoration: none;
        color: #262626;
        background-color: #f5f5f5;
    }

    @media (max-width: 767px) {
        .dropdown-menu.multi-column {
            min-width: 240px !important;
            overflow-x: hidden;
        }
    }

    .sponsor-button {
        background-color: #224096;
        color: white;
        margin-left: 9px;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        font-family: Arial, sans-serif;
        cursor: pointer;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
    }

    .sponsor-button:hover {
        background-color: #ef018d;
    }



    .social-icons.fload-right {
        float: right;
        margin-right: 86px;
        margin-bottom: 5px;
        /* padding-top: 3px; */
        padding: 5px;
    }

    .social.social-icons.d-flex.w-50 {
        margin-left: 50px;
        padding-bottom: 10px;
    }

    nav.navbar.bootsnav.navbar-light.no-background.white .attr-nav>ul>li>a,
    nav.navbar.bootsnav.navbar-light.no-background.white ul.nav>li>a,
    nav.navbar.bootsnav.navbar-light.white .attr-nav>ul>li>a,
    nav.navbar.bootsnav.navbar-light.white ul.nav>li>a {
        color: #f5f5f5;
        padding-left: 53px;
    }

    a {
        color: #f5f5f5;
    }

    nav.navbar.bootsnav ul.nav>li> {
        margin-right: 20px;
    }

    ul.nav.navbar-nav.navbar-right {
        margin-right: 23px;
    }

    button.btn.btn-success {
        font-size: 13px;
        font-weight: 600;
        /* padding-right: 10px; */
        margin-right: 10px;
    }

    .top_navbar {
        max-width: 90%;
        margin: auto;
        max-height: 160px;
        padding: 10px 0px;
    }
</style>



<nav class="navbar navbar-default  navbar-light white bootsnav">
    <div class="">

        <!-- Top Navigation menu strt -->

        <nav class="top_navbar">
            <div class="container">

                <div class="social-icons fload-right">
                    <a href="#"><i class="fa-brands fa-square-facebook"
                            style="font-size: 24px; color: blue; margin-right: 10px;"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"
                            style="font-size: 24px; color: #ff0000; margin-right: 10px;"></i></a>
                    <a href="#"><i class="fas fa-envelope"
                            style="font-size: 24px; color: blue; margin-right: 10px;"></i></a>
                    <a href="#"><i class="fas fa-phone"
                            style="font-size: 24px; color: blue; margin-right: 10px;"></i></a>
                </div>
                <div class="">
                    <div class="d-flex ">

                        <div class=" d-flex align-items-center">

                            <a class="navbar-brand" href="{{ url('/') }}" style=" margin: 15px; padding: 0;">
                                <img style="height: 50px; margin-top:24px" class="img-responsive "
                                    src="{{ URL::to('/') }}/admin_assets/logo/ability-for-disability-fund.png"
                                    class="logo logo-scrolled" alt="">
                            </a>

                        </div>
                        <style>
                            .input-group {
                                display: flex;
                                align-items: stretch;
                            }

                            .input-group .form-control {
                                /* Rounded corners on the left */
                            }

                            .input-group .btn {
                                /* Rounded corners on the right */
                                margin-bottom: 18px
                                    /* Remove double border */
                            }

                            .navbar.navbar-light .form-control {
                                background: #fff;
                                color: #636d75;
                                border: 1px solid #e4e4e4;
                                margin-top:5px
                            }

                        </style>
                <div class="col-md-4 m-5" style="margin-top: 45px; margin-left: 140px;">
                    <form action="{{ route('search') }}" method="GET" id="search-form"> <!-- Replace with your desired action -->
                        <div class="input-group">
                            <input type="text" placeholder="Search..." class="form-control" name="query" required> <!-- Add name for form submission -->
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success" style="border-radius: 5px;">Search</button>
                            </div>
                        </div>
                    </form>
                </div>




                        <!-- Right Side: Icons, Language Switcher, Buttons -->

                        <div class="col-md-4 d-flex justify-content-end align-items-center " id="social-link" style="margin-left: 60px">
                            <div class="social social-icons d-flex w-50 " s>

                                <!-- Buttons -->


                                <a href="{{ url('/signin') }}">
                                    <button class="btn btn-success" style="border-radius: 5px">My Account</button>

                                </a>

                                <a href="{{ Route('sponsor_child') }}">
                                    <button class="btn btn-success" style="border-radius: 5px">Sponsor a Child </button>

                                </a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </nav>

        <!-- Top Navigation menu end -->

        <!-- <a class="navbar-brand" href="{{ url('/') }}" style=" margin: 0; padding: 0;">
            <img style="width: 110px; padding: 0px 0px 0px 0px;margin-top: 18px;" class="img-responsive" src="{{ URL::to('/') }}/admin_assets/logo/ability-for-disability-fund.png" class="logo logo-scrolled" alt="">
        </a> -->
        <div class="navbar-header container ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu"
                style="float: right; margin-right: 30px; margin-top: 0px;margin-bottom: 20px;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="col-md-1"></div>
        <div class="collapse navbar-collapse mx-auto navbar-fixed " id="navbar-menu"
            style="margin: 0 auto; display: table; background:rgb(31, 66, 148) ">
            <ul class="nav navbar-nav navbar-left text-white" data-in="fadeInDown" data-out="fadeOutUp"
                style="text-align: center">
                <li><a href=" {{ url('/') }} " class="">HOME</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                    <ul class="dropdown-menu multi-column columns-2 ">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    @foreach (App\Models\Category::where('type', 'About')->get() as $anoutmenu)
                                    <li>
                                        <a class="dropdown-item" href="{{'/view_aboutepage/'.$anoutmenu->id}}">{{$anoutmenu->title}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    @foreach (App\Models\Category::where('type', 'Committee')->get() as $committeemenu)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ '/view_committeepage/' . $committeemenu->id }}">{{ $committeemenu->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"> OUR ACTIVITES </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item text-uppercase" href="{{ url('/event') }}">Events</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ url('/champaign') }}">Champaign</a></li>
                        <li><a class="dropdown-item text-uppercase" href="{{ url('/project') }}">PROJECTS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">INVOLVED </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="{{ url('/volunteer') }}">Join as Volunteer</a></li>
                        <li><a class="dropdown-item" href="{{ url('/signin') }}">Join as Donor</a></li>
                    </ul>
                <li class="dropdown megamenu-fw">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"> Media </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href=" {{ url('/All-Gallery') }}">GALLERY</a></li>
                        <li><a href="/All-Video"></i>VIDEO</a></li>
                        <li><a href="{{ url('/news') }}">NEWS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="" href="{{ Route('donate.index') }}"> Donate US </a>
                    <ul class="" aria-labelledby="">
                        {{-- <li><a href=" {{ url('/All-Gallery')}}">Donate</a> --}}
                </li>
                {{-- <li><a href="{{ url('login') }}"></i> Donor Login</a></li>
    <li><a href="{{ url('signin') }}">Donor Registration</a></li> --}}
            </ul>
            </li>
            <li><a href=" {{ url('/Contact-Us') }}">CONTACT</a></li>
            {{-- <a href="{{Route('sponsor_child')}}">
    <button class="sponsor-button">Sponsor A Child</button>
    </a> --}}

            <ul class="dropdown-menu megamenu-content drop_nav_media" role="menu">
                <div class="col-menu col-md-12">
                    <h6 class="title">Media gallery</h6>
                    <div class="content">
                        <ul class="menu-col">
                            <li><a href="/All-Gallery"><i class="fa fa-bullseye" aria-hidden="true"></i> GALLERY</a>
                            </li>
                            <li><a href="/All-Video"><i class="fa fa-youtube" aria-hidden="true"></i>Video</a></li>
                        </ul>
                    </div>
                </div>
            </ul>

            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="text-align: center;">
                @if (!empty(auth()->user()->id) && auth()->user()->type == 2)
                    <li class="dropdown megamenu-fw left-br" id="navbar-menu">
                        <div class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle text-white"
                                style="padding: 10px 20px; font-size: 10px"
                                data-toggle="dropdown">{{ auth()->user()->name }} <i
                                    class="ace-icon fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu megamenu-content drop_nav_new pull-right" role="menu">
                                {{-- <li class="">
                                <div class="row "> --}}
                                <div class="col-menu col-md-4 ">
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="/admin">Dashboard</a></li>
                                            <li>
                                                <a style="color: red" class="dropdown-item "
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- </div>
                            </li> --}}
                            </ul>
                        </div>
                    </li>
                @endif
                @if (!empty(auth()->user()->id) && auth()->user()->type == 1)
                    <li class="dropdown megamenu-fw left-br" id="navbar-menu">
                        <div class="dropdown megamenu-fw">
                            <a href="#" class="dropdown-toggle" style="padding: 10px 20px; font-size: 10px"
                                data-toggle="dropdown">{{ auth()->user()->name }} <i
                                    class="ace-icon fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu megamenu-content drop_nav_new pull-right" role="menu">
                                <li class="">
                                    <div class="row ">
                                        <div class="col-menu col-md-4 ">
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="/admin">Dashboard</a></li>
                                                    <li>
                                                        <a style="color: red" class="dropdown-item "
                                                            href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                               document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>

