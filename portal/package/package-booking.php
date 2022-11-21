<?php
    include '../../connection/conn.php';
    include '../../includes/header.php';
?>
<title>Reservation Portal</title>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h2 style="color: rgb(255, 130, 5);"><strong>Degars Manor</strong></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="basicExampleNav">
            <span class="text-white">Contact Us: </span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-facebook-f" style="color: blue;"></i>
                        facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-solid fa-envelope" style="color: red;"></i>
                        Gmail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-instagram-square"
                            style="color: brown;"></i> Instagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-twitter"
                            style="color: lightblue;"></i> Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</nav><br><br><br><br><br><br>

<!-- Reservation form -->
<div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-10">
        <div class="bg-white shadow rounded">
            <div class="row">
                <div class="col-md-7 pe-0">
                    <div class="form-left h-100 py-5 px-5">
                        <form action="portalquery/insertpReservation.php" method="POST" class="row g-4">
                            <div class="col-12">
                                <h3 style="color: rgb(255, 130, 5);" class="mb-3"><strong> PACKAGE RESERVATION</strong>
                                </h3>
                                <hr>
                                <div class="col-12">
                                    <label>Choose Date<span class="text-danger">*</span></label> <a class="float-end"
                                        href="../exclusive/exclusive-booking.php">Switch
                                        to Exclusive reservation <i class="fa-solid fa-circle-arrow-right"></i></a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="resDate"
                                            placeholder="Please Choose Date" onfocus="(this.type='date')"
                                            onblur="(this.type='text')" required>
                                    </div>
                                </div>

                                <label>Select Package</label>
                                <div class="input-group">
                                    <select id="packages" name="packageName" onchange="packageRate()"
                                        class="form-select form-select-lg" aria-label="Default select example" required>
                                        <option value="Package1">Package 1</option>
                                        <option value="Package2">Package 2</option>
                                        <option value="Package3">Package 3</option>
                                    </select>
                                </div>
                            </div>
                            <script>
                            function packageRate() {
                                var packageSelection = document.getElementById("packages").value;
                                switch (packageSelection) {
                                    case "Package1":
                                        document.getElementById("rate").value = 599;
                                        break;
                                    case "Package2":
                                        document.getElementById("rate").value = 1199;
                                        break;
                                    case "Package3":
                                        document.getElementById("rate").value = 1;
                                        break;
                                }
                            }
                            </script>
                            <div class="form-input d-flex justify-content-end">
                                <label for="" class="p-2">Amount</label>
                                <input type="text" id="rate" class="form-control" name="rate" placeholder=""
                                    readonly>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-secondary" href="../home.html">Back</a>
                                <input type="submit" class="btn btn-primary" value="Next" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../../image/packageA.png" id="package1" height="460" width="100%"
                                    alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../image/packageB.png" id="package1" height="460" width="100%"
                                    alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../../image/packageA.png" id="package1" height="460" width="100%"
                                    alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon bg-white" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon bg-white" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php
include '../../includes/footer.php';
?>