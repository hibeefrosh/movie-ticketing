<?php
$title = 'Home';
// Include the main layout
if (
    session_status() == PHP_SESSION_NONE
) {
    session_start();
}
// Access configuration values from the session
if (isset($_SESSION['appName']) && isset($_SESSION['appUrl'])) {
    $appName = $_SESSION['appName'];
    $appUrl = $_SESSION['appUrl'];
} else {
    // Handle the case where session values are not set
    // You may want to redirect to the index page or set default values
}

ob_start();
?>


<section id="center" class="center_home">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php foreach ($frontPageMovies as $key => $movie) :
                $genresArray = json_decode($movie['genres'], true);
            ?>

                <div class="carousel-item <?php echo $key === 0 ? 'active' : ''; ?>">
                    <img src="<?php echo $movie['picture_url']; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h1 class="font_60"> <?php echo $movie['title']; ?></h1>
                        <h6 class="mt-3">
                            <span class="col_red me-3">
                                <?php
                                $imdbRating = $movie['imdb_rating'];

                                // Generate star icons based on IMDb rating
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $imdbRating) {
                                        echo '<i class="fa fa-star"></i>';
                                    } else {
                                        echo '<i class="fa fa-star-o"></i>';
                                    }
                                }
                                ?>
                            </span>
                            <?php
                            // Extract the year from the full release date
                            $releaseYear = date('Y', strtotime($movie['release_date']));
                            echo $imdbRating . ' (IMDb) Year: ' . $releaseYear;
                            ?>

                            <a class="bg_red p-2 pe-4 ps-4 ms-3 text-white d-inline-block" href="#"><?php echo $genresArray[0]; ?></a>
                        </h6>
                        <p class="mt-3"><?php echo $movie['description']; ?></p>
                        <p class="mb-2"><span class="col_red me-1 fw-bold">Genres:</span> <?php echo $genresArray[0]; ?></p>
                        <p>
                            <span class="col_red me-1 fw-bold">Runtime:</span>
                            <?php
                            $runtimeMinutes = $movie['duration_minutes'];
                            $hours = floor($runtimeMinutes / 60);
                            $minutes = $runtimeMinutes % 60;
                            echo $hours . 'h ' . $minutes . 'm';
                            ?>
                        </p>
                        <h6 class="mt-4">
                            <a class="button" target="_blank" href="https://www.youtube.com">
                                <i class="fa fa-play-circle align-middle me-1"></i> Watch Trailer
                            </a>
                        </h6>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section id="trend" class="pt-4 pb-5">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-6 col-6">
                <div class="trend_1l">
                    <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Latest <span class="col_red">Movies</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="trend_1r text-end">
                    <!-- <h6 class="mb-0"><a class="button" href="#"> View All</a></h6> -->
                </div>
            </div>
        </div>
        <div class="row trend_2 mt-4">
            <div class="row">
                <?php foreach ($latestMovies as $movie) : ?>
                    <div class="col-md-3 col-6 mb-4">
                        <div class="trend_2im clearfix position-relative">
                            <div class="trend_2im1 clearfix">
                                <div class="grid">
                                    <figure class="effect-jazz mb-0">
                                        <a href="#"><img src="<?php echo $movie['picture_url']; ?>" class="w-100 h-100" alt="<?php echo $movie['title']; ?>"></a>
                                    </figure>
                                </div>
                            </div>
                            <div class="trend_2im2 clearfix text-center position-absolute w-100 top-0">
                                <span class="fs-1"><a class="col_red" href="#"><i class="fa fa-youtube-play"></i></a></span>
                            </div>
                        </div>
                        <div class="trend_2ilast bg_grey p-3 clearfix">
                            <h5><a class="col_red" href="#"><?php echo $movie['title']; ?></a></h5>
                            <p class="mb-2"><?php echo $movie['description']; ?></p>
                            <p class="mb-2"><?php echo  '₦' . $movie['price']; ?></p>
                            <span class="col_red">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </span>
                            <!-- Add Buy Ticket button with a link to the ticket page -->
                            <a class="btn btn-primary" onclick="openModal(<?php echo $movie['movie_id']; ?>)">Buy Ticket</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<section id="upcome" class="pt-4 pb-5">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-6 col-6">
                <div class="trend_1l">
                    <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Upcoming <span class="col_red">Events</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="trend_1r text-end">
                    <!-- <h6 class="mb-0"><a class="button" href="#"> View All</a></h6> -->
                </div>
            </div>
        </div>
        <div class="row trend_2 mt-4">
            <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
                <div class="row">
                    <?php foreach ($upcomingEvents as $event) : ?>
                        <div class="col-md-4 mb-4">
                            <div class="trend_2im clearfix position-relative">
                                <div class="trend_2im1 clearfix">
                                    <div class="grid">
                                        <figure class="effect-jazz mb-0">
                                            <a href="#"><img src="<?php echo $event['picture_url']; ?>" class="w-100" alt="<?php echo $event['title']; ?>"></a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="trend_2im2 clearfix text-center position-absolute w-100 top-0">
                                    <span class="fs-1"><a class="col_red" href="#"><i class="fa fa-youtube-play"></i></a></span>
                                </div>
                            </div>
                            <div class="trend_2ilast bg_grey p-3 clearfix">
                                <h5><a class="col_red" href="#"><?php echo $event['title']; ?></a></h5>
                                <p class="mb-2"><?php echo $event['description']; ?></p>
                                <p class="mb-2"><?php echo '₦' . $event['price']; ?></p>
                                <span class="col_red">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <!-- Add Buy Ticket button with a link to the ticket page -->
                                <a class="btn btn-primary" onclick="openModal(<?php echo $movie['movie_id']; ?>)">Buy Ticket</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>



            </div>
        </div>
    </div>
</section>

<section id="popular" class="pt-4 pb-5 bg_grey">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-12">
                <div class="trend_1l">
                    <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Trending <span class="col_red">Events</span></h4>
                </div>
            </div>
        </div>
        <div class="row popular_1 mt-4">
            <ul class="nav nav-tabs  border-0 mb-0">
                <li class="nav-item">
                    <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span class="d-md-block">JUST ARRIVED</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#settings_o" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span class="d-md-block">FREE MOVIES</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="popular_2 row mt-4">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row">
                        <?php foreach ($justArrived as $movie) : ?>
                            <div class="col-md-6 mb-4">
                                <div class="popular_2i1 row">
                                    <div class="col-md-4 col-4">
                                        <div class="popular_2i1lm position-relative clearfix">
                                            <div class="popular_2i1lm1 clearfix">
                                                <div class="grid">
                                                    <figure class="effect-jazz mb-0">
                                                        <a href="#"><img src="<?php echo $movie['picture_url']; ?>" class="w-100" alt="<?php echo $movie['title']; ?>"></a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="popular_2i1lm2 position-absolute top-0 w-100 text-center clearfix">
                                                <ul>
                                                    <li class="d-inline-block"><a href="#"><i class="fa fa-link col_red"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="fa fa-search col_red"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-8">
                                        <div class="popular_2i1r">
                                            <h5><a class="col_red" href="#"><?php echo $movie['title']; ?></a></h5>
                                            <h6><?php echo implode(', ', json_decode($movie['genres'])); ?></h6>
                                            <h6> IMDb <?php echo str_repeat('<i class="fa fa-star col_red me-1"></i>', $movie['imdb_rating']); ?> <span class="ms-2">Year: <?php echo date('Y', strtotime($movie['release_date'])); ?> <span class="ms-2">Runtime: <?php echo floor($movie['duration_minutes'] / 60) . 'h ' . ($movie['duration_minutes'] % 60) . 'm'; ?></span></h6>
                                            <p><?php echo $movie['description']; ?></p>
                                            <p><?php echo '₦' . $movie['price']; ?></p>
                                            <!-- Add Buy Ticket button with a link to the ticket page -->
                                            <a class="btn btn-primary" onclick="openModal(<?php echo $movie['movie_id']; ?>)">Buy Ticket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>


                </div>

                <div class="tab-pane" id="settings_o">
                    <div class="row">
                        <?php foreach ($freeMovies as $movie) : ?>
                            <div class="col-md-6 mb-4">
                                <div class="popular_2i1 row">
                                    <div class="col-md-4 col-4">
                                        <div class="popular_2i1lm position-relative clearfix">
                                            <div class="popular_2i1lm1 clearfix">
                                                <div class="grid">
                                                    <figure class="effect-jazz mb-0">
                                                        <a href="#"><img src="<?php echo $movie['picture_url']; ?>" class="w-100" alt="<?php echo $movie['title']; ?>"></a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="popular_2i1lm2 position-absolute top-0 w-100 text-center clearfix">
                                                <ul>
                                                    <li class="d-inline-block"><a href="#"><i class="fa fa-link col_red"></i></a></li>
                                                    <li class="d-inline-block"><a href="#"><i class="fa fa-search col_red"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-8">
                                        <div class="popular_2i1r">
                                            <h5><a class="col_red" href="#"><?php echo $movie['title']; ?></a></h5>
                                            <h6><?php echo implode(', ', json_decode($movie['genres'])); ?></h6>
                                            <h6> IMDb <?php echo str_repeat('<i class="fa fa-star col_red me-1"></i>', $movie['imdb_rating']); ?> <span class="ms-2">Year: <?php echo date('Y', strtotime($movie['release_date'])); ?> <span class="ms-2">Runtime: <?php echo floor($movie['duration_minutes'] / 60) . 'h ' . ($movie['duration_minutes'] % 60) . 'm'; ?></span></h6>
                                            <p><?php echo $movie['description']; ?></p>
                                            <p><?php echo '₦' . $movie['price']; ?></p>
                                            <!-- Add Buy Ticket button with a link to the ticket page -->
                                            <a class="btn btn-primary" onclick="openModal(<?php echo $movie['movie_id']; ?>)">Buy Ticket</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<section id="choice" class="pt-4 pb-5">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-6 col-6">
                <div class="trend_1l">
                    <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Director's <span class="col_red">Choice</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="trend_1r text-end">
                    <!-- <h6 class="mb-0"><a class="button" href="#"> View All</a></h6> -->
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($directorChoice as $movie) : ?>
                <div class="col-md-4 mb-4">
                    <div class="trend_2im clearfix position-relative">
                        <div class="trend_2im1 clearfix">
                            <div class="grid">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="<?php echo $movie['picture_url']; ?>" class="w-100" alt="<?php echo $movie['title']; ?>"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="trend_2im2 clearfix position-absolute w-100 top-0">
                            <h5><a class="col_red" href="#"><?php echo $movie['title']; ?></a></h5>
                            <span class="col_red">
                                <?php
                                $rating = $movie['imdb_rating'];
                                for ($i = 0; $i < $rating; $i++) {
                                    echo '<i class="fa fa-star"></i>';
                                }
                                ?>
                            </span>
                            <!-- Remove Views for Director's Choice -->
                            <p><?php echo '₦' . $movie['price']; ?></p>
                            <!-- Add Buy Ticket button with a link to the ticket page -->
                            <a class="btn btn-primary" onclick="openModal(<?php echo $movie['movie_id']; ?>)">Buy Ticket</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<section id="play">
    <div class="play_m clearfix">
        <div class="container">
            <div class="row trend_1">
                <div class="col-md-12">
                    <div class="trend_1l">
                        <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Top <span class="col_red">10 Playlist</span></h4>
                    </div>
                </div>
            </div>
            <div class="play1 row mt-4 bg_grey pt-3 pb-3">
                <div class="col-md-9">
                    <div class="play1l">
                        <div class="grid clearfix">
                            <figure class="effect-jazz mb-0">
                                <a href="#"><img src="img/new1.jpg" class="w-100" height="450" alt="abc"></a>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ps-0">
                    <div class="play1r">
                        <div class="play1ri">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="img/new2.jpg" class="w-100" alt="abc"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="play1ri mt-3">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="img/new3.jpg" class="w-100" alt="abc"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="play1ri mt-3">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="img/new6.jpg" class="w-100" alt="abc"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="play1ri mt-3">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="img/new13.jpg" class="w-100" alt="abc"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="play1ri mt-3">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="img/new19.jpg" class="w-100" alt="abc"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="play1ri mt-3">
                            <div class="grid clearfix">
                                <figure class="effect-jazz mb-0">
                                    <a href="#"><img src="img/new12.jpg" class="w-100" alt="abc"></a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="play2 row mt-4">
                <div class="col-md-4 p-0">
                    <div class="play2l">
                        <div class="grid clearfix">
                            <figure class="effect-jazz mb-0">
                                <a href="#"><img src="<?php echo $bestMovieDetails['picture_url']; ?>" height="515" class="w-100" alt="abc"></a>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 p-0">
                    <div class="play2r bg_grey p-4">
                        <h5><span class="col_red">BEST MOVIE OF THE MONTH :</span> <?php echo $bestMovieDetails['title']; ?><br>
                            <?php $genresArray = json_decode($bestMovieDetails['genres'], true);
                            // Check if decoding was successful and if it's an array
                            $genres = is_array($genresArray) ? implode(', ', $genresArray) : $bestMovieDetails['genres'];
                            echo $genres; ?></h5>
                        <h5 class="mt-3"><?php echo $bestMovieDetails['description']; ?></h5>
                        <hr class="line">
                        <p class="mt-3"><?php echo '₦' . $bestMovieDetails['price']; ?></p>
                        <div class="play2ri row mt-4">
                            <div class="col-md-6">
                                <div class="play2ril">
                                    <?php
                                    // Function to convert minutes to hours and minutes
                                    function convertToHoursAndMinutes($minutes)
                                    {
                                        $hours = floor($minutes / 60);
                                        $remainingMinutes = $minutes % 60;

                                        if ($hours > 0 && $remainingMinutes > 0) {
                                            return $hours . ' hr ' . $remainingMinutes . ' min';
                                        } elseif ($hours > 0) {
                                            return $hours . ' hr';
                                        } else {
                                            return $remainingMinutes . ' min';
                                        }
                                    }
                                    ?>
                                    <h6 class="fw-normal">
                                        Running Time: <span class="pull-right"><?php echo convertToHoursAndMinutes($bestMovieDetails['duration_minutes']); ?></span>
                                    </h6>
                                    <hr class="hr_1">
                                    <h6 class="fw-normal">
                                        Genre: <span class="pull-right"><?php echo $genres; ?></span></h6>
                                    <hr class="hr_1">
                                    <?php
                                    // Function to generate star icons based on IMDb rating
                                    function generateStars($rating)
                                    {
                                        $stars = '';
                                        $fullStars = floor($rating);
                                        $halfStar = ($rating - $fullStars) >= 0.5;

                                        // Full stars
                                        for ($i = 0; $i < $fullStars; $i++) {
                                            $stars .= '<i class="fa fa-star"></i>';
                                        }

                                        // Half star (if applicable)
                                        if ($halfStar) {
                                            $stars .= '<i class="fa fa-star-half"></i>';
                                        }

                                        return $stars;
                                    }
                                    ?>
                                    <h6 class="fw-normal">
                                        Stars: <span class="pull-right"><?php echo generateStars($bestMovieDetails['imdb_rating']); ?></span>
                                    </h6>
                                    <hr class="hr_1">
                                    <h6 class="fw-normal">
                                        Release Date: <span class="pull-right"><?php echo $bestMovieDetails['release_date']; ?></span></h6>
                                    <hr class="hr_1 mb-0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="play2rir">
                                    <h6 class="fw-normal">Imdb - <?php echo $bestMovieDetails['imdb_rating']; ?></h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $bestMovieDetails['imdb_rating'] * 10; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!-- Add other rating details as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
<style>
    #buyTicketModal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        text-align: left;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 4px;
    }
</style>

<div id="buyTicketModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        <!-- Your Styled Form Goes Here -->
        <form id="buyTicketForm" action="<?php echo $appUrl . '/buy-ticket'; ?>" method="POST">
            <div class="form-group">
                <label style="color: black;" for="full_name">Full Name:</label>
                <input class="form-control" type="text" name="full_name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label style="color: black;" for="card_number">Card Number:</label>
                <input class="form-control" type="text" name="card_number" placeholder="Enter your card number" required>
            </div>

            <div class="form-group">
                <label style="color: black;" for="cardholder_name">Cardholder Name:</label>
                <input class="form-control" type="text" name="cardholder_name" placeholder="Enter the cardholder's name" required>
            </div>

            <div class="form-group">
                <label style="color: black;" for="expiration_date">Expiration Date:</label>
                <input class="form-control" type="text" name="expiration_date" placeholder="MM/YYYY" required>
            </div>

            <div class="form-group">
                <label style="color: black;" for="cvv">CVV:</label>
                <input class="form-control" type="text" name="cvv" placeholder="Enter the CVV" required>
            </div>

            <div class="form-group">
                <label style="color: black;" for="email">Email:</label>
                <input class="form-control" type="text" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label style="color: black;" for="phone_number">Phone Number:</label>
                <input class="form-control" type="text" name="phone_number" placeholder="Enter your phone number" required>
            </div>

            <!-- Movie ID as a hidden input -->
            <input type="hidden" name="movie_id" id="movieIdInput">

            <!-- Submit Button -->
            <button type="submit">Book Ticket</button>
        </form>

    </div>
</div>
<!-- Your Styled Modal HTML -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Booking Successful</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color:black">Your movie ticket has been successfully booked!</p>
                <p style="color:black">A confirmation and details of your ticket have been emailed to you. Enjoy the show!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(movieId) {
        document.getElementById('movieIdInput').value = movieId;
        document.getElementById('buyTicketModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('buyTicketModal').style.display = 'none';
    }

    // Close the modal if the user clicks outside the modal content
    window.onclick = function(event) {
        var modal = document.getElementById('buyTicketModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    document.getElementById('movieIdInput').value = movieId;
</script>
<script>
    $(document).ready(function() {
        // Check if the session variable is set
        const bookingSuccess = <?php echo json_encode($_SESSION['booking_success'] ?? false); ?>;

        if (bookingSuccess) {
            // Show the success modal
            $('#successModal').modal('show');

            // Reset the session variable after showing the modal
            <?php unset($_SESSION['booking_success']); ?>;
        }
    });
</script>


<?php $content = ob_get_clean();

require_once BASE_PATH . '/views/layouts/app.php';
?>