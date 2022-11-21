<?php
include 'connection/conn.php';
session_start();
?>
<title>Login</title>
<?php include 'includes/header.php';?>
<nav class="navbar navbar-expand-md fixed-top" style="background-color: #003049;" >
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
            <h1 style="color: #ffff ;"><strong>Degars Manor</strong></h1>
        </a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse justify-content-end" id="basicExampleNav">
            <!-- Links -->
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
                            style="color: orange;"></i> Instagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../home.html"><i class="fa-brands fa-twitter" style="color: blue;"></i>
                        Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</nav><br><br><br><br><br>
<div class="container-fluid">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-6 mb-5 mb-lg-0 mx-6">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-body py-5 px-md-5">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Username</label>
                                <input type="text" id="form3Example3" name="adminUsername" class="form-control"
                                    placeholder="Username" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" name="adminPass" id="form3Example4" class="form-control"
                                    placeholder="Password" required />
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-secondary me-md-2" href="index.html">Back</a>
                                <input type="submit" class="btn btn-primary" value="Login" name="login">
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            if (isset($_POST['login']))
            {
            // removes backslashes
            $adminUsername = stripslashes($_REQUEST['adminUsername']);
            //escapes special characters in a string
            $adminUsername = mysqli_real_escape_string($db, $adminUsername);
            $adminPass = stripslashes($_REQUEST['adminPass']);
            $adminPass = mysqli_real_escape_string($db, $adminPass);

            $loginQuery = mysqli_query($db, "SELECT * FROM `admin` WHERE adminUsername='$adminUsername' AND adminPass='$adminPass'");
            $row = mysqli_fetch_array($loginQuery);
            if (is_array($row)) {
                $_SESSION["adminUsername"] =$row ['adminUsername'];
                $_SESSION["adminPass"] =$row ['adminPass'];
            } else {
                echo"<script>alert(\"Invalid username or password!\");</script>";
            }
            }
            if (isset($_SESSION['adminUsername'])) 
            {
                echo"<script>window.location.href='admin/dashboard.php';</script>";
            }
        ?>
    </div>
</div>
</div><br><br><br><br><br><br>
<!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
<footer class="d-flex flex-wrap justify-content-between align-items-center fixed-bottom border-top ">
    <p class="col-md-4 mb-0 text-muted">© 2022 Degars Manor, Inc</p>
    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
</footer>

<?php
include 'includes/footer.php';
?>