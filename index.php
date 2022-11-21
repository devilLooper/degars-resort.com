<?php 
error_reporting(0);
include "connection/conn.php";
$fetchstatus = "SELECT * FROM e_reservation";
$getres = mysqli_query($db,$fetchstatus);
$fetchrow = mysqli_fetch_assoc($getres);
$status =$fetchrow['status'];
$dueDate =$fetchrow['dueDate'];
$datetoday = date('Y-m-d');
if ($dueDate == $datetoday && $status = 'PENDING') {
    $auto_update_stats = "UPDATE `e_reservation` SET status = 'CANCELLED'";
$auto_update_stats_result = mysqli_query($db, $auto_update_stats);

if ($auto_update_stats_result) {
    header("refresh: 1800;");
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="res/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://www.favicon.cc/logo3d/333752.png" type="image/x-icon">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

html,
body,
header,
#intro {
    font-family: 'Poppins', sans-serif;
    height: 100%;
}

#intro {
   /* background: url("https://images.alphacoders.com/269/269623.jpg")no-repeat center center fixed;*/
    background: url("image/rescar1.jpg")no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.top-nav-collapse {
    background-color: #090909;
}

@media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
        background-color: #24355C;
    }
}

@media (min-width: 800px) and (max-width: 850px) {
    .navbar:not(.top-nav-collapse) {
        background-color: #d0d7e7;
    }
}
</style>

<body class="">
    <!--Main Navigation-->
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand href=" #">
                    <h2 style="color: rgb(255, 130, 5);"><strong>Degars Manor</strong></h2>
                </a>
                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-end" id="basicExampleNav">
                    <!-- Links -->
                    <ul class="navbar-nav  smooth-scroll">
                        <li class="nav-item active">
                            <a class="nav-link" href="#intro">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#best-features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#packages">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="checkres.php">Check Reservation </a>
                        </li>
                    </ul>
                    <!-- Links -->
                    <!-- Social Icon  -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        
        <!--/.Navbar-->
        <!--Mask-->
        <div id="intro" class="view">
            <div class="mask rgba-black-strong">
                <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <br><br> <br><br> <br><br>
                            <h2 class="display-4 font-weight-bold text-primary pt-5 mb-2">BOOK NOW</h2>
                            <!-- Description -->
                            <h4 class="text-white my-4">Keep calm and go swim.
                                Life is cool
                                by the pool.</h4>
                            <a class="btn btn-primary" href="portal/quickstart.php">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="mt-5">
        <div class="container" style="background-color: rgba(255, 255, 255, 0.5);">
            <!--Section: Best Features-->
            <section id="best-features" class="text-center">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold">Best Features</h2>
                <!--Grid row-->
                <div class="row d-flex justify-content-center mb-4">
                    <!--Grid column-->
                    <div class="col-md-8">
                        <!-- Description -->
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi voluptate
                            hic
                            provident nulla repellat
                            facere esse molestiae ipsa labore porro minima quam quaerat rem, natus repudiandae debitis
                            est
                            sit pariatur.
                        </p>
                    </div>

                </div>
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-4 mb-5">
                        <i class="fa fa-camera-retro fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Experience</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.
                        </p>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fa fa-heart fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Happiness</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.
                        </p>
                    </div>

                    <div class="col-md-4 mb-1">
                        <i class="fa fa-bicycle fa-4x orange-text"></i>
                        <h4 class="my-4 font-weight-bold">Adventure</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.
                        </p>
                    </div>
                </div>

            </section>
            <!--Section: Best Features-->
            <hr class="my-5">
            <!--Section: Examples-->
            <section id="packages" class="text-center">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold"> Affordable Packages</h2>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="view overlay z-depth-1-half">
                            <img src="image/packageA.png" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                        <button class="btn btn-primary my-4">Book Now</button>
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.
                        </p>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="view overlay z-depth-1-half">
                            <img src="image/packageB.png" class="img-fluid" alt="">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                        <button class="btn btn-primary my-4">Book Now</button>
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.
                        </p>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="view overlay z-depth-1-half">
                            <img src="image/packageA.png" class="img-fluid" alt="" height="240">
                            <div class="mask rgba-white-slight"></div>
                        </div>
                        <button class="btn btn-primary my-4">Book Now</button>
                        <p class="grey-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit
                            maiores nam,
                            aperiam minima
                            assumenda deleniti hic.
                        </p>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
                <!--Grid row-->
                <div class="row">
            </section>
            <!--Section: Examples-->
            <hr class="my-5">
            <!-- foR ROOMRATES -->
            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <img src="image/Beige & Brown Aesthetic Elegant Minimalist Photographer Pricing Guide Flyer.png" alt="" class="img-fluid">
                </div>
            </div>
            <!-- foR ROOMRATES -->
            <hr>
            <!--Section: Gallery-->
            <section id="gallery">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center">Gallery</h2>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 mb-4">
                        <!--Carousel Wrapper-->
                        <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade"
                            data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner z-depth-1-half" role="listbox">
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <img class="d-block w-100"
                                        src="http://wallpapers.net/web/wallpapers/beach-resort-hd-wallpaper/thumbnail/lg.jpg"
                                        alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                        src="https://pixelz.cc/wp-content/uploads/2018/10/resort-pool-sunset-thailand-uhd-4k-wallpaper.jpg"
                                        alt="Second slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100"
                                        src="https://c4.wallpaperflare.com/wallpaper/476/84/39/nature-landscape-french-polynesia-swimming-pool-wallpaper-preview.jpg"
                                        alt="Third slide">
                                </div>
                                <!--/Third slide-->
                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="teal-text">
                            <h6 class="pb-1"><i class="fa fa-heart"></i><strong> Gallery </strong></h6>
                        </a>
                        <h4 class="mb-3"><strong>Degars Manor History</strong></h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia iure vitae enim debitis
                            adipisci veritatis, mollitia ad repellendus, fugit pariatur consequatur libero quae dolore
                            deserunt molestias. Deleniti officiis nihil eius.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, laboriosam. Facilis ratione
                            sed error quaerat quod hic suscipit dolor numquam praesentium necessitatibus, soluta
                            consectetur aut aperiam impedit officia cupiditate et?
                        </p>
                        <p>- <a><strong>Tim Gorgonio Morales</strong></a></p>
                        <a class="btn btn-primary btn-md">Read more</a>
                    </div>
                </div>
            </section>
            <!--Section: Gallery-->
            <hr class="my-5">
            <!--Section: Contact-->
            <section id="contact">
                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center">Message Us</h2>
                <div class="container py-4">
                    <!-- Bootstrap 5 starter form -->
                    <form id="contactForm">
                        <!-- Name input -->
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Name"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                        </div>

                        <!-- Email address input -->
                        <div class="mb-3">
                            <label class="form-label" for="emailAddress">Email Address</label>
                            <input class="form-control" id="emailAddress" type="email" placeholder="Email Address"
                                data-sb-validations="required, email" />
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is
                                required.</div>
                            <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is
                                not valid.</div>
                        </div>

                        <!-- Message input -->
                        <div class="mb-3">
                            <label class="form-label" for="message">Message</label>
                            <textarea class="form-control" id="message" type="text" placeholder="Message"
                                style="height: 10rem;" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                        </div>

                        <!-- Form submissions success message -->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">Form submission successful!</div>
                        </div>

                        <!-- Form submissions error message -->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>

                        <!-- Form submit button -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg disabled" id="submitButton"
                                type="submit">Submit</button>
                        </div>

                    </form>
                </div>
                <!--Google map-->
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                            marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Degars Manor&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                            href="https://www.kokagames.com/fnf-friday-night-funkin-mods/">Friday Night Funkin Mods</a>
                    </div>
                    <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        width: 100%;
                        height: 400px;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        width: 100%;
                        height: 400px;
                    }

                    .gmap_iframe {
                        height: 400px !important;
                    }
                    </style>
                </div>
                
        </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
        </section>
        <!--Section: Contact-->
        </div>
    </main>
    <!--Main layout-->
    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark">
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong class="text-success">Degars Manor</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui libero accusamus laudantium
                        quasi quas perspiciatis repellendus eius! Dolores eligendi officiis ad cum quas, neque suscipit
                        iste dolorem numquam modi laboriosam!
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Products</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!">View list of products</a></p>
                    <p><a href="#!">View Cottages</a></p>
                    <p><a href="#!">View rooms</a></p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold"><strong>Social Media links</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a href="#!">Facebook</a></p>
                    <p><a href="#!">Email</a></p>
                    <p><a href="#!">Twitter</a></p>
                    <p><a href="#!">Instagram</a></p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><i class="fas fa-home"></i></i> Maloro, Tangub City</p>
                    <p><i class="fa fa-envelope mr-3"></i> degarsmanor@email.com</p>
                    <p><i class="fa fa-phone mr-3"></i> +639 508 297 97</p>
                    <p><i class="fa fa-print mr-3"></i> +639 262 713 257</p>
                </div>
            </div>
        </div>
        
    </footer>
    <script>
    // Regular map
    function regular_map() {
        var var_location = new google.maps.LatLng(40.725118, -73.997699);
        var var_mapoptions = {
            center: var_location,
            zoom: 14
        };
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title: "New York"
        });
    }
    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);
    // Carousel options
    $('.carousel').carousel({
        interval: 3000,
    })
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>