<?php
    include '../../connection/conn.php';
    include '../../includes/header.php';
    include '../validation.php';
?>
<title>Customer Details</title>
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
</nav><br><br>


<!-- Reservation form -->
<div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5">
                <div class="position-relative m-2">
                    <Label>
                        <h3>Please fill up this form</h3>
                    </Label>
                    <hr>
                    <form action='portalquery/insertpCustomer.php' method="POST">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-outline">
                                    <?php 
                                    $sql = "SELECT pid FROM p_reservation order by packageResInserted DESC LIMIT 1";
                                    $result = $db -> query($sql);
                                    $row = $result -> fetch_assoc();
                                    ?>
                                    <input type="text" name="pid" value="<?php echo $row['pid'];?>">
                                    <label class="form-label" for="form6Example1">First name</label>
                                    <input type="text" name="firstName" id="form6Example1" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <label class="form-label" for="form6Example2">Last name</label>
                                    <input type="text" name="lastName" id="form6Example2" class="form-control"
                                        required />
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form6Example3">Phone Number</label>
                            <input type="text" name="phoneNum" id="form6Example3" class="form-control" required />
                        </div>

                        <!-- Text input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form6Example4">Address</label>
                            <input type="text" name="address" id="form6Example4" class="form-control" required />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form6Example5">Email Address</label>
                            <input type="email" name="emailAddress" id="form6Example5" class="form-control" required />
                        </div>
                        <!-- Submit button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-secondary me-md-2" href="../index.html">Back</a>
                            <input type="submit" class="btn btn-primary" value="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../../includes/footer.php';
    ?>