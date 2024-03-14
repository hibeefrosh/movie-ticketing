<?php
$title = 'Services';
ob_start();
?>

<section id="center" class="center_o pt-2 pb-2">
    <div class="container-xl">
        <div class="row center_o1">
            <div class="col-md-5">
                <div class="center_o1l">
                    <h2 class="mb-0">Services</h2>
                </div>
            </div>
            <div class="col-md-7">
                <div class="center_o1r text-end">
                    <h6 class="mb-0 col_red"><a href="#">Home</a> <span class="me-2 ms-2 text-light"><i class="fa fa-caret-right align-middle"></i></span> Services</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="movie_services" class="pt-4 pb-4 bg_grey">
    <div class="container-xl">
        <div class="row movie_services_title">
            <div class="col-md-12">
                <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Explore <span class="col_red">Our Movie Services</span></h4>
            </div>
        </div>
        <div class="row movie_services_items mt-4">
            <div class="col-md-4">
                <div class="movie_services_item bg_dark p-4 pt-3">
                    <h1 class="col_light"><i class="fa fa-film"></i> <span class="pull-right">01</span></h1>
                    <h5 class="col_red">Movie Recommendations</h5>
                    <p class="mt-3">Discover and enjoy personalized movie recommendations based on your preferences and taste.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="movie_services_item bg_dark p-4 pt-3">
                    <h1 class="col_light"><i class="fa fa-film"></i> <span class="pull-right">02</span></h1>
                    <h5 class="col_red">Online Ticket Booking</h5>
                    <p class="mt-3">Book your movie tickets online for a hassle-free and convenient cinema experience.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="movie_services_item bg_dark p-4 pt-3">
                    <h1 class="col_light"><i class="fa fa-gamepad"></i> <span class="pull-right">03</span></h1>
                    <h5 class="col_red">Exclusive Movie Events</h5>
                    <p class="mt-3">Join exclusive movie events and screenings for a unique and immersive cinematic experience.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="spec">
    <div class="spec_m">
        <div class="container-xl">
            <div class="spec_1 row">
                <div class="col-md-3 col-6">
                    <div class="spec_1i text-center p-4">
                        <span class="font_60 col_red"><i class="fa fa-user-md"></i></span>
                        <h1>160</h1>
                        <h5>Experienced Staff</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="spec_1i text-center p-4">
                        <span class="font_60 col_red"><i class="fa fa-bar-chart"></i></span>
                        <h1>550</h1>
                        <h5>Completed Projects</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="spec_1i text-center p-4">
                        <span class="font_60 col_red"><i class="fa fa-tags"></i></span>
                        <h1>170</h1>
                        <h5>Winning Awards</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="spec_1i text-center p-4">
                        <span class="font_60 col_red"><i class="fa fa-smile-o"></i></span>
                        <h1>270</h1>
                        <h5>Satisfied Customers</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="price" class="pt-4 pb-4">
    <div class="container-xl">
        <div class="row price_1">
            <div class="row work_1 mt-5">
                <div class="col-md-6">
                    <div class="work_1l">
                        <h4 class="col_red mb-4">What We Do</h4>
                        <div class="accordion" id="movieServicesAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="movieServiceOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#movieCollapseOne" aria-expanded="true" aria-controls="movieCollapseOne">
                                         Curate Exceptional Movie Selection
                                    </button>
                                </h2>
                                <div id="movieCollapseOne" class="accordion-collapse collapse show" aria-labelledby="movieServiceOne" data-bs-parent="#movieServicesAccordion">
                                    <div class="accordion-body">
                                        We carefully curate a diverse selection of movies, ranging from classic masterpieces to the latest blockbusters, ensuring a captivating cinema experience for our audience.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="movieServiceTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#movieCollapseTwo" aria-expanded="false" aria-controls="movieCollapseTwo">
                                         Create a Comfortable Movie Environment
                                    </button>
                                </h2>
                                <div id="movieCollapseTwo" class="accordion-collapse collapse" aria-labelledby="movieServiceTwo" data-bs-parent="#movieServicesAccordion">
                                    <div class="accordion-body">
                                        We prioritize creating a comfortable and immersive movie environment. From plush seating to state-of-the-art sound systems, we ensure that your time at the cinema is enjoyable and memorable.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="movieServiceThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#movieCollapseThree" aria-expanded="false" aria-controls="movieCollapseThree">
                                         User-Friendly Movie Booking Website
                                    </button>
                                </h2>
                                <div id="movieCollapseThree" class="accordion-collapse collapse" aria-labelledby="movieServiceThree" data-bs-parent="#movieServicesAccordion">
                                    <div class="accordion-body">
                                        Our user-friendly website makes it easy for you to browse movie schedules, book tickets online, and explore additional details about upcoming releases. We prioritize a seamless online experience for our patrons.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="work_1r">
                        <h4 class="col_red mb-4">Our Skills</h4>
                        <div class="play2rir">
                            <h6 class="fw-normal">Nice Website <span class="pull-right">92%</span></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 92%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6 class="fw-normal mt-4">Condusive Environment <span class="pull-right">73%</span></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 73%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6 class="fw-normal mt-4">Professional Staffs <span class="pull-right">90%</span></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6 class="fw-normal mt-4">Development <span class="pull-right">83%</span></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 83%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h6 class="fw-normal mt-4">Ms Office <span class="pull-right">79%</span></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 79%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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