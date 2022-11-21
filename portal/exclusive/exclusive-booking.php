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
</nav><br><br><br><br>

<!-- Reservation form -->
<div class="container p-4">
    <div class="row">
        <div class="col-sm-7 p-4">
            <form action="portalquery/insertReservation.php" method="POST">
                <div class="form-input">
                    <h3 class="mb-3" style="color: rgb(255, 130, 5);"><strong>EXCLUSIVE RESERVATION</strong></h3><hr>
                    <label for="">Event Name</label>
                    <a class="float-end" href="../package/package-booking.php">Switch to package
                        reservation <i class="fa-solid fa-circle-arrow-right"></i></a>
                    <input type="text" class="form-control" placeholder="Event Name" name="eventName" required>
                </div>
                <div class="form-input">
                    <label for="">Select Date</label>
                    <input type="date" class="form-control" placeholder="" name="resDate" required>
                </div>
                <div class="form-input">
                    <label for="">Select Pool Type</label>
                    <select name="poolType" onchange="myRate()" id="selection" class="form-select form-select-lg"
                        aria-label="Default select example" required>
                        <option value="Kiddie Pool">Choose pool size.....</option>
                        <option value="Olympic Size Pool">Olympic Size Pool</option>
                        <option value="Kiddie Pool">Kiddie Pool</option>
                    </select>
                </div>
                <script>
                function myRate() {
                    var poolSelection = document.getElementById("selection").value;
                    switch (poolSelection) {
                        case "Kiddie Pool":
                            document.getElementById("rate").value = 1;
                            break;
                        case "Olympic Size Pool":
                            document.getElementById("rate").value = 15000;
                            break;
                    }
                }
                </script>
                <div class="form-input">
                    <label for="">Amount</label>
                    <input type="text" id="rate" class="form-control" name="rate" placeholder="" readonly>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary me-md-2" href="../index.html">Back</a>
                    <input type="submit" class="btn btn-primary" value="Next" name="submit">
                </div>
            </form>
        </div>
        <div class="col-sm-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../../image/rescar1.jpg" id="package1" height="460" width="100%"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../image/rescar2.jpg" id="package1" height="460" width="100%"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../image/rescar3.jpg" id="package1" height="460" width="100%"
                            alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
    include '../../includes/footer.php';
    ?>