<?php
$title = 'Book ticket';
ob_start();
?>

<section id="center" class="center_o pt-2 pb-2">
    <div class="container-xl">
        <div class="row center_o1">
            <div class="col-md-5">
                <div class="center_o1l">
                    <h2 class="mb-0">Book Ticket</h2>
                </div>
            </div>
            <div class="col-md-7">
                <div class="center_o1r text-end">
                    <h6 class="mb-0 col_red"><a href="#">Home</a> <span class="me-2 ms-2 text-light"><i class="fa fa-caret-right align-middle"></i></span> Book Ticket</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <form>
        <div class="col-md-9">
            <div class="contact_2l ">
                <div class="col-md-12">
                    <div class="contact_2l1 mt-3 ">
                        <div class="col-md-6">
                            <div class="contact_2l1i">
                                <input class="form-control" placeholder="Firstname*" type="text">
                            </div>
                        </div>
                        <p></p>
                        <div class="col-md-6">
                            <div class="contact_2l1i">
                                <input class="form-control" placeholder="Middlename*" type="text">
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="col-md-6">
                        <div class="contact_2l1i">
                            <input class="form-control" placeholder="Lastname*" type="text">
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="col-md-6">
                    <div class="contact_2l1i">
                        <input class="form-control" placeholder="Movie Name*" type="text">
                    </div>
                </div>
            </div>
            <p></p>
            <div class="col-md-6">
                <div class="contact_2l1i">
                    <input class="form-control" placeholder="Email*" type="text">
                </div>
            </div>
            <p></p>
            <div class="col-md-6">
                <div class="contact_2l1i">
                    <input class="form-control" placeholder="Phone Number*" type="text">
                </div>
            </div>
        </div>
        <h6 class="mt-4 mb-0"><a class="button" href="#"> Book Ticket</a></h6>
        
    </form>
</section>

<?php $content = ob_get_clean();

require_once BASE_PATH . '/views/layouts/app.php';
?>