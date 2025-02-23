<style>
    /* Reset and Basic Styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'System UI', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }

    body {
        background-color: #f0f0f0;
    }



    .navbar {
        position: relative;
        /* min-height: 50px; */
        margin-bottom: 0px;
        border: 1px solid transparent;
        background-color: #ffffff;
    }

    .navbar-container {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    /* Logo Styling */
    .logo {
        color: #ffc000;
        font-size: 24px;
        font-weight: bold;
        display: flex;
        align-items: center;

    }


    .nav-links {
        display: flex;
        gap: 25px;
        /* background-color:white; */
        padding: 10px 20px;
        border-radius: 25px;
        list-style: none;
        margin-right: 356px;
        /* position: sticky; */
        position: sticky;
        z-index: 100;
        margin-bottom: 0px

    }

    .nav-links li {
        position: relative;


    }

    .nav-links a {
        text-decoration: none;
        /* color: #1d2a3a; */
        color: black;
        font-size: 16px;
        font-weight: 500;
        display: flex;
        align-items: center;

    }

    .nav-links a::after {
        content: '';
        font-size: 12px;
        margin-left: 5px;
        transition: transform 0.3s;
    }

    /* Show arrow for items with submenus */
    .has-submenu>a::after {
        content: '▼';
        /* color: rgb(29, 42, 58); */
        color: white;
        display: inline;
    }

    /* Rotate arrow on hover */
    .nav-item:hover>a::after {
        transform: rotate(180deg);
    }

    .has-submenu>a::after {
        color: black;
    }

    /* Dropdown Menu */
    .dropdown-menu {
        display: none;
        position: relative;
        margin: 0px;
        color: #393A3C;
    }

    .dropdown-menu .li .a {
        color: black;
    }

    .nav-item:hover .dropdown-menu,
    .dropdown-menu:hover {
        display: block;
        color: black;
    }

    .dropdown-item {
        display: block;
        color: black;
    }

    .dropdown-item:hover {
        background-color: rgb(248, 248, 248);
    }

    ul#navLink.nav-links {
        margin-left: 40px;
    }



    /* Right Side Buttons */
    .nav-buttons {
        display: flex;
        align-items: center;
        gap: 20px;
        /* margin-top: 30px; */
    }


    .nav-buttons {
        z-index: 50;
        /* position: fixed; */
        top: 0px;
        /* Adjust as needed */
        right: 20px;
        /* Adjust as needed */

    }

    .buttonFixed {
        position: fixed;
        display: flex;
        margin-left: 761px;
        margin-top: -6px;
    }



    .input-group .form-control:first-child,
    .input-group-addon:first-child,
    .input-group-btn:first-child>.btn,
    .input-group-btn:first-child>.btn-group>.btn,
    .input-group-btn:first-child>.dropdown-toggle,
    .input-group-btn:last-child>.btn-group:not(:last-child)>.btn,
    .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: -1px;
        border-bottom-right-radius: -1px;
    }

    .btn-success {
        /* background-color: rgb(17, 183, 25); */
        background-color: #393A3C;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        color: #f2f5f8;
    }

    .input-group {
        margin-left: 15px;
    }

    .form-control {
        height: 38px;
    }

    /* Modal Styling */
    .modal .form-control {
        height: 52px;
        border: 1px solid #d7dfea;
        color: #727272;
        width: 100%;
        margin: 0 auto 12px;
        font-size: 15px;
        border-radius: 120px;
        box-shadow: none;
    }

    @media (min-width: 768px) {

        /* Show Hamburger Icon on Mobile */
        .hamburger {
            display: none;

        }
    }

    @media (min-width: 768px) {
        .navbar {
            border-radius: 0px;
        }
    }

    @media (max-width: 768px) {

        /* Show Hamburger Icon on Mobile */
        .hamburger {
            display: block;
            font-size: 24px;
            cursor: pointer;
            color: #ffc000;
        }

        /* Adjust the nav-links for overlay effect */
        .nav-links {
            display: none;
            flex-direction: column;
            gap: 0;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            border-radius: 0;
            padding: 10px 20px;
            z-index: 10;


        }

        /* Show nav links when toggled */
        .nav-links.active {
            display: flex;
        }

        /* Dropdown styling for mobile */
        .dropdown-menu {
            position: static;
            background-color: #ffffff;
        }

        .nav-buttons {
            display: none;
        }

        .inner-header-title:before {
            position: absolute;
            content: "";
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            display: none;
            background: #242d3e;
            opacity: .6;
        }

        @media (max-width: 624px) {
            body {
                margin: 0px;
            }

        }
    }

    .navbar {
        position: relative;
        /* min-height: 50px; */
        margin-bottom: 0px;
        border: 1px solid transparent;
    }

    .modal .form-control {
        height: 52px;
        border: 1px solid #d7dfea;
        color: #727272;
        width: 70%;
        font-size: 15px;
        border-radius: 120px;
        box-shadow: none;
        margin-top: 50px;
    }

    @media (min-width: 768px) {
        .contact-info {
            display: none;
        }
    }
</style>
<style>
    .event-list {

        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 0px;
        padding: 10px;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    .event-list2 {

        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 0px;
        padding: 10px;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 10;
        display: none
    }

    .event-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .event-item2 {
        display: flex;
        /* justify-content: flex-start; */
        margin-right: 20px;
        align-items: center;
        margin-bottom: 10px;
    }

    .aboutus6 {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-bottom: 10px;

    }

    .event-item27 {
        display: flex;
        /* justify-content: space-around; */
        align-items: center;
        margin-bottom: 10px;
    }

    .involved33 {
        display: flex;
        /* justify-content: space-around; */
        align-items: center;
        margin-bottom: 10px;
    }

    .event-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 0px;
    }

    .event-item span {
        font-size: 14px;
        font-weight: 500;
    }
</style>



<section style="background-color: black; color: white; padding: 10px 20px;">
    <div
        style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: auto; flex-wrap: wrap; gap: 20px;">
        <!-- Social Media Icons -->
        <div style="display: flex; gap: 15px;">
            <a href="https://facebook.com" target="_blank" style="text-decoration: none; color: white;">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com" target="_blank" style="text-decoration: none; color: white;">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://instagram.com" target="_blank" style="text-decoration: none; color: white;">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" style="text-decoration: none; color: white;">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>

        <!-- Phone Number -->
        <div class="" style="display:flex">
            <div style1="font-size: 14px;">
                📞 <a href="tel:+1234567890" style="text-decoration: none; color: white;">+1 234 567 890</a>
            </div>

            <!-- Address -->
            <div style2="font-size: 14px;" style="margin-left: 15px">
            || 123 Main Street, City, Country
            </div>
        </div>
    </div>
</section>


<nav class="navbar">
    @php
        $footers = App\Models\contactUs::all();
    @endphp
    @foreach ($footers as $footer)
        <div class="contact-info">
            <p class="text-white"><i class="fa-solid fa-square-phone"></i> Phone: {{ $footer->phone }}</p>


        </div>
        <div class="navbar-container" id="topBar">
            <!-- Logo -->
            <div class="logo">
                <a class="" href="{{ url('/') }}">

                    <img style="height: 100px; " class="img-responsive img-fluid navbar-brand"
                        src="{{ URL::to('/') }}/images/2a6585d4-e9d0-40ef-98dd-d3afb105b76e.jpg" alt="">
                </a>
            </div>
    @endforeach
    <div class="hamburger" id="hamburger">&#9776;</div>

    {{-- donate button --}}
    <div class="nav-buttons row">

        <ul  class="nav-links" id="navLinks">


            <li><a class="nav-item2 " href="{{ url('/') }}">HOME</a></li>

            <li class="nav-item has-submenu">

                <a class="nav-item2 " id="aboutus5" href="">
                    About Us
                </a>

            </li>


            <li class="nav-item has-submenu">
                {{-- activities --}}
                <a class="nav-item2" id="donateUsButton23" href="">
                    Activities
                </a>
            </li>

            {{-- involved --}}
            <li class="nav-item has-submenu">
                <a class="nav-item2 " id="involvedID" href="">
                    Involved
                </a>

            </li>

            {{-- media --}}
            <li class="nav-item has-submenu">
                <a class="nav-item2" id="donateUsButton233" href="">
                    Media
                </a>
            </li>

            <li><a class="nav-item2" href="{{ url('/Contact-Us') }}">CONTACT</a></li>


            {{-- <div class="buttonFixed d-flex" style="margin-right: 20px;">
                <!-- Donate Us Button -->
                <a class="nav-item" id="donateUsButton"  href="{{ url('/event') }}">
                    <button class="btn btn-success text-white">
                        Donate Us
                    </button>
                </a>

                <!-- Sponsor Button -->
                <a class="nav-item" href="{{ Route('sponsor_child') }}">
                    <button class="btn btn-success text-white">
                        Sponsor
                    </button>
                </a>

                <!-- Support Button with Tooltip -->
                <a class="nav-item" href="{{ Route('support.showForm') }}">
                    <button class="btn btn-success text-white text-bold" style="margin-right: 20px" data-bs-toggle="tooltip" data-bs-placement="top" title="Ask what you need" id="large-tooltip">
                        <span style="font-size: 20px">?</span>
                    </button>
                </a>
            </div> --}}

        </ul>






        @php
            // Fetch the first 4 events
            $events = App\Models\Event::take(4)->get();
        @endphp

        <div id="eventList" class="event-list" style="margin-top:0px; margin-left: 0px;">
            <div class="aboutus6">
                @foreach ($events as $event)
                    <div>
                        <a href="{{ route('event.show', ['slug' => $event->slug]) }}">
                            <img src="{{ asset($event->image) }}"
                                style="width: 300px; height: 150px; object-fit: cover; border-radius: 5px; margin-right: 0px;"
                                class="card-img-top img-responsive" alt="...">
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ Str::limit($event->name, 30, '...') }}
                                </h2>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="block">
                    <h3><a href="/event"><button class="btn btn-success" style="margin-bottom:120px">All event</button>
                        </a></h3>
                </div>
            </div>


        </div>


        {{-- about us start --}}
        <div id="aboutus4" class="event-list" style="margin-top:0px; margin-left:0px; z-index:9 ">
            <div class="aboutus6">
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
                    @php
                        $menus = App\Models\Category::whereIn('type', ['About', 'Committee'])
                            ->orderBy('order_by', 'ASC')
                            ->get();
                        // Chunk the collection into rows with 4 items per row
                        $chunkedMenus = $menus->chunk(4);
                    @endphp

                    @foreach ($chunkedMenus as $row)
                        <div style="display: flex; width: 100%; justify-content: start;">
                            @foreach ($row as $menu)
                                <a class="dropdown-item"
                                    href="{{ $menu->type === 'About' ? '/view_aboutepage/' . $menu->id : '/view_committeepage/' . $menu->id }}">
                                    <img src="{{ asset($menu->image) }}" alt=""
                                        style="height: 150px; width: 300px; margin: 10px;">
                                    <h4 style="text-align: center">{{ $menu->title }}</h4>
                                </a>
                            @endforeach
                        </div>
                    @endforeach

                    <!-- Additional static items -->

                </div>
            </div>
        </div>

        {{-- about us end --}}

        {{-- Acitivities --}}
        <div id="all2222" class="event-list" style=" margin-top:0px;margin-left:00px;">
            <div class="event-item2">
                <div style="margin-left:20px">
                    <a class="dropdown-item" href="{{ url('/event') }}">
                        <img src="{{ asset('images/event/Events.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Events</h3>
                    </a>
                </div>

                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="{{ url('/project') }}">
                        <img src="{{ asset('images/event/project.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Running Projects</h3>
                    </a>
                </div>
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="{{ url('/project') }}">
                        <img src="{{ asset('images/event/project.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Completed Projects</h3>
                    </a>
                </div>


            </div>
        </div>

        {{-- activities end --}}


        {{-- Media start --}}
        <div id="all23" class="event-list" style=" margin-top:0px;margin-left:00px;">
            <div class="event-item27">
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="{{ url('/All-Gallery') }}">
                        <img src="{{ asset('images/event/Gallery.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Gallery</h3>
                    </a>
                </div>
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="/All-Video">
                        <img src="{{ asset('images/event/Video.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Video</h3>
                    </a>
                </div>
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="{{ url('/news') }}">
                        <img src="{{ asset('images/event/news.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">News</h3>
                    </a>
                </div>
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="{{ route('frontend.pages.blog') }}">
                        <img src="{{ asset('images/event/Blog.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Blog</h3>
                    </a>
                </div>
            </div>
        </div>

        {{-- media end --}}


        {{-- Involved start --}}
        <div id="involved3" class="event-list" style=" margin-top:0px;margin-left:00px;">
            <div class="involved33">

                <div style="margin-left:20px;">
                    <a class="dropdown-item" href="{{ url('/signin') }}">
                        <img src="{{ asset('images/event/Join-as-a-Donor.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Join as a Donor</h3>
                    </a>
                </div>
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="{{ url('/volunteer') }}">
                        <img src="{{ asset('images/event/Join-as-a-Volunteer.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Join as a Volunteer</h3>
                    </a>
                </div>
                <div style="margin-left: 20px">
                    <a class="dropdown-item" href="">
                        <img src="{{ asset('images/event/Carrer.jpg') }}" alt=""
                            style="height: 150px;width:300px;">
                        <h3 style="text-align: center">Carrer</h3>
                    </a>
                </div>


                {{-- @php
                    $notice = App\Models\Notice::first();
                @endphp

                <a class="dropdown-item" href="{{ route('frontend.pages.notice_show', ['id' => $notice->id]) }}">
                    <img src="{{ asset('images/event/200.png') }}" alt=""
                        style="height: 150px;width:300px;margin-left:30px;margin-right:20px;">
                    <h3 style="text-align: center"> Notice</h3>
                </a> --}}
                {{-- <div>
                            <a class="dropdown-item" href="">
                                <img src="{{asset('images/event/165.jpg')}}" alt="" style="height: 150px;width:300px;">
                                <h3 style="text-align: center">Coming Soon</h3></a>
                        </div>
                        <div>
                            <a class="dropdown-item" href="">
                                <img src="{{asset('images/event/165.jpg')}}" alt="" style="height: 150px;width:300px;">
                                <h3 style="text-align: center">Coming Soon</h3></a>
                        </div> --}}

            </div>
        </div>

        {{-- Involved end --}}



    </div>
    </div>

    </div>
</nav>
<style>
    .input-group-append {
        margin-left: 250px;
    }
</style>
<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body m-5 ">
                <form action="{{ route('search') }}" method="GET">
                    <div class="p-4">
                        <input type="text" class="form-control" name="query" placeholder="Search..." required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    function setupHoverMenu(buttonSelector, menuSelector) {
        const button = $(buttonSelector);
        const menu = $(menuSelector);
        let timeout;

        button.mouseenter(function() {
            // Show the menu when mouse enters the button
            clearTimeout(timeout);  // Clear any previous timeout
            menu.stop(true, true).fadeIn();  // Use fadeIn for smooth transition
        });

        button.mouseleave(function() {
            // Set a timeout to hide the menu after a delay (if mouse leaves the button)
            timeout = setTimeout(function() {
                menu.stop(true, true).fadeOut();  // Use fadeOut for smooth transition
            }, 200); // 200ms delay before hiding the menu
        });

        menu.mouseenter(function() {
            // Prevent hiding the menu when mouse enters the menu itself
            clearTimeout(timeout);
            menu.stop(true, true).fadeIn();
        });

        menu.mouseleave(function() {
            // Hide the menu when the mouse leaves the menu
            timeout = setTimeout(function() {
                menu.stop(true, true).fadeOut();
            }, 200); // 200ms delay before hiding the menu
        });
    }

    setupHoverMenu('#donateUsButton', '#eventList');
    setupHoverMenu('#donateUsButton23', '#all2222');
    setupHoverMenu('#donateUsButton233', '#all23');
    setupHoverMenu('#involvedID', '#involved3');
    setupHoverMenu('#aboutus5', '#aboutus4');

    // Smooth scroll functionality removed
    $('[id^="donateUsButton"], #involvedID, #aboutus5').on('click', function(event) {
        event.preventDefault();
        window.location.href = $(this).attr('href');
    });
});

</script>
