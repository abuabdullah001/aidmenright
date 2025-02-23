<style>
/* Container for the three vertical bars (Hamburger Icon) */


.containers {
    position: relative;
    cursor: pointer;
    position: fixed;
    top: 50%; /* Center vertically relative to the viewport */
    left: 20px; /* Distance from the left of the screen */
    transform: translateY(50%);
    z-index: 10;
}

/* The individual bars (three dots) */
.bar1, .bar2, .bar3 {
    width: 35px;
    height: 5px;
    background-color: black;
    margin: 6px 0;
    transition: 0.4s; /* Smooth transition for animation */
}

/* When the hamburger is clicked, transform the bars into an "X" */
.change .bar1 {
    transform: translate(0, 11px) rotate(-45deg); /* First bar rotates */
}

.change .bar2 {
    opacity: 0; /* Second bar disappears */
}

.change .bar3 {
    transform: translate(0, -11px) rotate(45deg); /* Third bar rotates */
}

/* Carousel Styles */
.carousel-inner, img {
    height: 500px; /* Maintain the height of the carousel images */
}

</style>

<!-- Hamburger Icon (Three Vertical Dots) -->
<div class="containers" onclick="myFunction(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
</div>

<!-- Carousel -->

<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($slidersImages as $key => $eachImage)
            <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <style>
        .carousel-inner, img {
            height: 500px; /* Maintain the height of the carousel images */
        }
    </style>


    <!-- Wrapper for slides -->
    <div class="carousel-inner text-center h-25" role="listbox">
        @foreach($slidersImages as $key => $eachImage)
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ URL::asset('/slider/'.$eachImage->image) }}" style="height:500px">
            </div>
        @endforeach
       <div class="carousel-caption d-none d-md-block text-center">
         <h1> Welcome to Men's right Forum </h1>
         <h3 style="color:#ffffff;">Men's right Forum </h3>
       </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <i class="fa-solid fa-angles-left glyphicon glyphicon-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <i class="fa-solid fa-angles-right glyphicon glyphicon-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>


<script>
  $(document).ready(function(){
      // Activate Carousel
      $("#myCarousel").carousel();

      // Enable Carousel Controls
      $(".left").click(function(){
          $("#myCarousel").carousel("prev");
      });
      $(".right").click(function(){
          $("#myCarousel").carousel("next");
      });
  });


</script>

<script>
 function myFunction(x) {
    x.classList.toggle("change");

    // Scroll to the top bar smoothly
    const topBar = document.getElementById("topBar");
    topBar.scrollIntoView({ behavior: "smooth", block: "start" });
}
</script>
