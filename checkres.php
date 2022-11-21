<?php
error_reporting(0);
ini_set('display_errors', 0);
    include 'connection/conn.php';

    include_once 'includes\header.php';
?>
<title>Check Reservation</title>
<nav class="navbar navbar-expand-md fixed-top" style="background-color: #393E46;">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">
            <h1 style="color: #F7F7F7 ;"><strong>Degars Manor</strong></h1>
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
</nav><br><br><br>
<form action="" method="POST">
    <div class="container-fluid d-flex justify-content-center mt-4">

        <div class="row g-2  d-flex justify-content-end">
            <div class="input-group mb-3 w-auto">

                <input type="text" name="search" class="form-control form-control-lg"
                    placeholder="Your Reference Number">
                <button class="btn btn-primary" name="submit" type="submit">Search</button>

            </div>
        </div>
</form>
</div>

<div class="container-fluid">
    <div class="row">
    </div>
    <div class="card">
        <div class="card-body">
            <?php 
        include 'connection/conn.php';
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $zero = '.00';
            $sql = "SELECT tr.transac_ID,tr.transac_ref,tr.mode_of_payment,tr.totalrate,tr.added_charge,tr.add_ons,tr.amountReceived,tr.currentBalance,e.eid,e.eventName,e.resDate,e.dueDate,e.poolType,e.rate,e.status,c.cust_ID,c.firstName,c.lastName,c.phoneNum,c.address,c.emailAddress
            FROM e_transaction AS tr
            INNER JOIN e_reservation AS e ON tr.eid = e.eid
            INNER JOIN customerdetails AS c ON tr.cust_ID = c.cust_ID
            WHERE tr.transac_ref = '$search'";

            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_assoc($result);
            
        }
        ?>
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f;font-size: 20px;">Reference >> <strong>No:
                            </strong><?php echo $row['transac_ref'];?></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <!-- <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                class="fas fa-print text-primary"></i> Print</a>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a> -->
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <!-- <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i> -->
                            <h1 class="pt-0 text">DEGARS RESORT</h1>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span style="color:#5d9fc5 ;"><?php echo $row['firstName'];?>
                                        <?php echo $row['lastName'];?></span></li>
                                <li class="text-muted"><?php echo $row['address'];?></li>
                                <li class="text-muted"><?php echo $row['emailAddress'];?></li>
                                <li class="text-muted"><i class="fas fa-phone"></i> <?php echo $row['phoneNum'];?></li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Reservation Details</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Reservation Date: </span><?php echo $row['resDate'];?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">Due Date: </span><?php echo $row['dueDate'];?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold  text-danger">Current Balance: </span>₱<?php echo $row['currentBalance'];?></li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-warning text-black fw-bold">
                                        <?php echo $row['status'];?></span>
                                </li>
                                <input type="hidden" name="" id="mystats" value="<?php echo $row['status'];?>">
                            </ul>
                        </div>
                    </div>
                    <div class="row my-2 mx-1 justify-content-center">
                        <?php 
                        include 'connection/conn.php';
                        if (isset($_POST['submit'])) {
                            $search = $_POST['search'];
                            $zero = '.00';
                            $sql = "SELECT tr.transac_ID,tr.transac_ref,tr.mode_of_payment,tr.totalrate,tr.added_charge,tr.add_ons,tr.amountReceived,e.eid,e.eventName,e.resDate,e.dueDate,e.poolType,e.rate,e.status,e.checkouturl
                            FROM e_transaction AS tr
                            INNER JOIN e_reservation AS e ON tr.eid = e.eid 
                            WHERE tr.transac_ref = '$search'";
                            $result = mysqli_query($db, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_array($result)) { 
                                    $total=$row['totalrate'] + $row['added_charge'];
                                    ?>

                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                    <tr>
                                        <th scope="col">EventName</th>
                                        <th scope="col">Pool Type</th>
                                        <th scope="col">Pool Rate</th>
                                        <th scope="col">Add Ons</th>
                                        <th scope="col">SubTotal</th>
                                        <th scope="col">Charges</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $row['eventName'];?></th>
                                        <td><?php echo $row['poolType'];?></td>
                                        <td>₱<?php echo $row['rate'];?></td>
                                        <td>₱<?php echo $row['add_ons'] ;?></td>
                                        <td>₱<?php echo $row['totalrate'] ;?></td>
                                        <td>₱<?php echo $row['added_charge'] ;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- <p class="ms-3">Add additional notes and payment information</p> -->

                            </div>
                            <div class="col-xl-3">
                                <p class="text-black float-start"><span class="text-black me-3"> Total
                                        Amount</span><span style="font-size: 25px;">
                                        <td>₱<?php echo $total;?></td>
                                    </span></p>
                            </div>
                        </div>
                        <?php
                            }
                        }
                    }
                    ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for booking</p>
                        </div>
                        <?php 
                        include 'connection/conn.php';
                        if (isset($_POST['submit'])) {
                            $search = $_POST['search'];
                            $zero = '.00';
                            $sql = "SELECT tr.transac_ID,tr.transac_ref,tr.mode_of_payment,tr.totalrate,tr.added_charge,tr.add_ons,tr.amountReceived,e.eid,e.eventName,e.resDate,e.dueDate,e.poolType,e.rate,e.status,e.checkouturl,c.cust_ID,c.firstName,c.lastName,c.phoneNum,c.address,c.emailAddress
                            FROM e_transaction AS tr
                            INNER JOIN e_reservation AS e ON tr.eid = e.eid
                            INNER JOIN customerdetails AS c ON tr.cust_ID = c.cust_ID
                            WHERE tr.transac_ref = '$search'";

                            $result = mysqli_query($db,$sql);
                            $row = mysqli_fetch_assoc($result);
                            
                        }
                        ?>
                        <div class="col-xl-2">
                            <a class="btn btn-primary style=" background-color:#84B0CA;" text-capitalize" id="btnMe"
                                href="<?php echo $row['checkouturl']; ?>">Checkout Url</a>
                        </div>
                    </div>
                    <script>
                    let myStats = document.getElementById('#mystats').value;

                    switch (myStats) {
                        case "APPROVED":
                            document.getElementById("#btnMe").style.visibility = "hidden";
                            break;
                        case "PENDING":
                            document.getElementById("#btnMe").style.visibility = "hidden";
                            break;
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once 'includes\footer.php';
?>