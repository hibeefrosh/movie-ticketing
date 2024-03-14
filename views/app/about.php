<?php
$title = 'About';
ob_start();
?>

<section id="center" class="center_o pt-2 pb-2">
    <div class="container-xl">
        <div class="row center_o1">
            <div class="col-md-5">
                <div class="center_o1l">
                    <h2 class="mb-0">About Us</h2>
                </div>
            </div>
            <div class="col-md-7">
                <div class="center_o1r text-end">
                    <h6 class="mb-0 col_red"><a href="#">Home</a> <span class="me-2 ms-2 text-light"><i class="fa fa-caret-right align-middle"></i></span> About Us</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about_planet_cinema">
    <div class="about_planet_cinema_content">
        <div class="container-xl">
            <div class="row about_planet_cinema_row">
                <div class="col-md-12">
                    <h2><span class="col_red">Welcome to Planet Cinema</span><br>
                        Your Ultimate Movie Experience</h2>
                    <p class="mt-3 w-50">Bringing you an unparalleled movie experience. Planet Cinema offers a seamless platform for booking and enjoying the latest movies.</p>
                    <p class="w-50">We understand the magic of cinema and its ability to transport you to different worlds. Planet Cinema is committed to providing a diverse range of films, from blockbusters to independent gems.</p>
                    <p class="w-50">Explore our comprehensive range of services to book tickets online, enjoy special screenings, and immerse yourself in the world of cinema. Our team is dedicated to ensuring your movie-going experience is exceptional.</p>
                    <h6 class="mb-0"><a class="button" href="#">Book Your Tickets Online</a></h6>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</section>



<section id="stream" class="pb-5 pt-4">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-6 col-6">
                <div class="trend_1l">
                    <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Movie <span class="col_red">Streaming Services</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="trend_1r text-end">
                    <!-- <h6 class="mb-0"><a class="button" href="#"> View All</a></h6> -->
                </div>
            </div>
        </div>
        <div class="row trend_2 mt-4">
            <div id="carouselExampleCaptions4" class="carousel slide" data-bs-ride="carousel">

                <div class="row">
                    <!-- Netflix -->
                    <div class="col-md-3">
                        <div class="trend_2i">
                            <div class="trend_2im clearfix position-relative">
                                <div class="trend_2im1 clearfix">
                                    <div class="grid">
                                        <figure class="effect-jazz mb-0">
                                            <a href="#"><img src="img/netflix.png" class="w-100" alt="Netflix"></a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="trend_2im2 clearfix position-absolute w-100 top-0">
                                    <h5><a class="col_red" href="#">Netflix</a></h5>
                                    <!-- Real-time description of Netflix -->
                                    <p class="mb-0">Watch a wide variety of movies, TV shows, and original content on Netflix.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hulu -->
                    <div class="col-md-3">
                        <div class="trend_2i">
                            <div class="trend_2im clearfix position-relative">
                                <div class="trend_2im1 clearfix">
                                    <div class="grid">
                                        <figure class="effect-jazz mb-0">
                                            <a href="#"><img src="img/hulu.png" class="w-100" alt="Hulu"></a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="trend_2im2 clearfix position-absolute w-100 top-0">
                                    <h5><a class="col_red" href="#">Hulu</a></h5>
                                    <!-- Real-time description of Hulu -->
                                    <p class="mb-0">Stream your favorite TV shows, movies, and exclusive Hulu Originals on Hulu.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Disney+ -->
                    <div class="col-md-3">
                        <div class="trend_2i">
                            <div class="trend_2im clearfix position-relative">
                                <div class="trend_2im1 clearfix">
                                    <div class="grid">
                                        <figure class="effect-jazz mb-0">
                                            <a href="#"><img src="img/disney.png" class="w-100" alt="Disney+"></a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="trend_2im2 clearfix position-absolute w-100 top-0">
                                    <h5><a class="col_red" href="#">Disney+</a></h5>
                                    <!-- Real-time description of Disney+ -->
                                    <p class="mb-0">Discover the magic of Disney with a vast collection of movies and series on Disney+.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Amazon Prime Video -->
                    <div class="col-md-3">
                        <div class="trend_2i">
                            <div class="trend_2im clearfix position-relative">
                                <div class="trend_2im1 clearfix">
                                    <div class="grid">
                                        <figure class="effect-jazz mb-0">
                                            <a href="#"><img src="img/amazon.png" class="w-100" alt="Amazon Prime Video"></a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="trend_2im2 clearfix position-absolute w-100 top-0">
                                    <h5><a class="col_red" href="#">Amazon Prime Video</a></h5>
                                    <!-- Real-time description of Amazon Prime Video -->
                                    <p class="mb-0">Enjoy a wide range of movies, TV shows, and original content on Amazon Prime Video.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>


<?php $content = ob_get_clean();

require_once BASE_PATH . '/views/layouts/app.php';
?>