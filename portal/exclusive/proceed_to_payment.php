<?php
    error_reporting(0);
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'manorsdb');
    $eid = $_GET['eid'];

    $fetchpurchased ="SELECT c.cust_ID,c.timeInserted,e.eid,e.eventName,e.resDate,e.dueDate,e.poolType,e.rate,addons.purchased_id
    FROM mypurchased AS addons
    INNER JOIN customerdetails AS c ON addons.cust_ID = c.cust_ID
    INNER JOIN e_reservation AS e ON addons.eid = e.eid
    ORDER BY timeInserted DESC LIMIT 1
    ";
    $fetchres = $db->query($fetchpurchased);
    $frow = mysqli_fetch_assoc($fetchres);
    $purchased_id = $frow['purchased_id'];

    $myroom = "SELECT * FROM `eaddroom` WHERE eid = '$eid'";
    $myroomres = $db->query($myroom);
    $myroomrow = mysqli_fetch_assoc($myroomres);

    $roomRates = $myroomrow['roomRates'];


    $sql1 = "SELECT customerdetails.cust_ID, customerdetails.firstName,customerdetails.lastName,customerdetails.phoneNum,customerdetails.emailAddress,e_reservation.eventName,e_reservation.resDate,e_reservation.dueDate,e_reservation.poolType,e_reservation.rate,e_reservation.status 
    FROM customerdetails 
    INNER JOIN e_reservation ON customerdetails.eid = e_reservation.eid 
    order by timeInserted DESC LIMIT 1";

    $result = $db -> query($sql1);
    $row = $result -> fetch_assoc();
    $cust_ID = $row['cust_ID'];
    $dueDate = $row['dueDate'];

    $var2 = ".00";
    $rand_transac_num = substr(md5(mt_rand()), 0,10);
    $addedCharge = 2;
    
    // $finalTotal = $paymongo_taxes + $row['rate']; //Adding the charge and the rate


    $add_all = "SELECT SUM(productPrice) AS totalPurchased FROM mypurchased
    WHERE eid = '$eid'";
    $sum_result = mysqli_query($db,$add_all);
    $sum_row = mysqli_fetch_assoc($sum_result);
    $totalpurchased = $sum_row['totalPurchased'];
    $add_ons = $sum_row['totalPurchased'] + $roomRates;
    $rate_purchased = $row['rate'] +  $totalpurchased + $roomRates;
    $include = ($addedCharge / 100) * $rate_purchased;
    $display = $rate_purchased + $include;
    $displayinqr = $row['rate'] + $totalpurchased;
    
    $paymongo_taxes = ($addedCharge / 100) * $rate_purchased; //Get the total of charge of any amount
?>
<?php 
include '../../includes/header.php';
?>

<title>Payments</title>
<nav class="navbar navbar-expand-md fixed-top mb-lg-5" style="background-color: #393E46;">
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
<div class="container-fluid my-lg-4 float-lg-start">
    <div class="row">
        <div class="container col-lg-7">
            <div class="card">
                <div class="card-header text-warning" style="background-color: #393E46;">
                    <?php 
                    $sql1 = "SELECT cust_ID FROM customerdetails ORDER BY timeInserted DESC LIMIT 1";
                    $results = $db -> query($sql1);
                    $rows = $results -> fetch_array();
                    if (is_array($rows)) {
                        $_SESSION["cust_ID"] =$rows ['cust_ID'];
                    }
                    ?>
                    <strong class="mx-4">Payment Portal</strong><a class="float-end"
                        href="portalquery/onback_delete_customer.php?cust_ID=<?php echo $_SESSION['cust_ID'];?>"><i
                            class="fa-solid fa-angles-left"></i>Back</a>
                </div>
                <div class="card-body">
                    <form class="mx-4"
                        action="exclusive_payment_gateway.php?cust_ID<?php echo $cust_ID;?>&eid=<?php echo $eid;?>"
                        method="post">
                        <input type="text" name="firstlast" id="eid"
                            value="<?php echo $row['firstName'] ;?> <?php echo $row['lastName'] ;?>">
                        <input type="text" name="phoneNum" id="eid" value="<?php echo $row['phoneNum'] ;?>">
                        <input type="text" name="emailAddress" id="eid" value="<?php echo $row['emailAddress'] ;?>">
                        <input type="text" name="eid" id="eid" value="<?php echo $eid;?>">
                        <input type="text" name="cust_ID" id="cust_ID" value="<?php echo $cust_ID;?>">
                        <input type="text" name="totalrate" id="rate" value="<?php echo $rate_purchased;?>">
                        <div class="form-group mb-2 mt-2">
                            <label for="">Transaction Reference</label>
                            <input type="text" name="transac_ref" id="" value="<?php echo $rand_transac_num;?>"
                                class="form-control bg-transparent" readonly>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-sm-6">
                                <label for="">Payment Method</label>
                                <a class="float-end" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Pay Via QR Code
                                </a>
                                <Select class="form-select form-select-lg" name="payment_method">
                                    <option value="Gcash">Gcash</option>
                                    <option value="Paymaya">Paymaya</option>
                                </Select>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Additional Charges</label>
                                <input type="text" name="added_charge" id=""
                                    value="<?php echo $paymongo_taxes;?>" class="form-control bg-transparent"
                                    readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Add-ons</label>
                                <input type="text" name="add_ons" id="" value="<?php echo $add_ons;?>"
                                    class="form-control bg-transparent" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Mode of Payment</label>
                            <Select class="form-select form-select-lg" onchange="myMOP()" id="mop"
                                name="mode_of_payment" required>
                                <option value="">--Please select--</option>
                                <option value="50% Downpayment">50% Downpayment</option>
                                <option value="Full Payment">Full Payment</option>
                            </Select>
                            <script>
                            function myMOP() {
                                var mop = document.getElementById("mop").value;
                                let rate = parseInt(document.getElementById("rate").value);

                                let paymongoTaxes = 2 / 100  * rate;
                                let fullpay = paymongoTaxes + rate;

                                let mopayment = (50 / 100) * rate;
                                let result = paymongoTaxes + mopayment;

                                switch (mop) {
                                    case "50% Downpayment":
                                        document.getElementById("amountReceived").value = mopayment;
                                        document.getElementById("currentBalance").value = mopayment;
                                        break;
                                    case "Full Payment":
                                        document.getElementById("amountReceived").value = rate;
                                        document.getElementById("currentBalance").value = 0;
                                        break;
                                }
                            }
                            </script>
                        </div>

                        <div class="form-group mb-2 mt-2">
                            <label for="">Total Amount to pay <em>(Including: <strong>charges, mode of payment
                                        selected, add-ons</strong>)</em></label>
                            <input type="text" name="amountReceived" id="amountReceived"
                                class="form-control bg-transparent" readonly>
                        </div>
                        <div class="form-group mb-2 mt-2">
                            <input type="text" name="currentBalance" id="currentBalance"
                                class="form-control bg-transparent" readonly>
                        </div>
                        <hr>
                        <!-- Buttons -->
                        <div class="d-grid gap-3 d-md-flex justify-content-md-end my-2">
                            <a href="../rooms/index.php?cust_ID=<?php echo $cust_ID; ?>&eid=<?php echo $eid; ?>"
                                class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-house-add" viewBox="0 0 16 16">
                                    <path
                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path
                                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                                Add Room</a>
                            <a href="../cart/index.php?cust_ID=<?php echo $cust_ID; ?>&eid=<?php echo $eid; ?>"
                                class="btn btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                Purchased Products</a>
                            <button class="btn btn-success" name="submit" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-wallet2" viewBox="0 0 16 16">
                                    <path
                                        d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                </svg>
                                Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Reservation Overview -->
        <div class="container col-lg-5">
            <div class="card" style="background-color: #393E46;">
                <div class="card-body">
                    <h1 class="text-center  text-warning">PHP <?php echo ceil($rate_purchased) .$var2;?></h1>

                    <div class="card">
                        <div class="card-header text-white" style="background-color: #6D9886;">
                            Reservation Overview
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless table-responsive-lg">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Event Name</td>
                                        <td><strong>
                                                <h4 style="text-transform: uppercase;"><?php echo $row['eventName'];?>
                                                </h4>
                                            </strong></td>
                                    </tr>
                                    <tr>
                                        <td>Reservation Date</td>
                                        <td><strong><?php echo $row['resDate'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Due</td>
                                        <td><strong><?php echo $row['dueDate'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Reservation Type</td>
                                        <td><strong>Exclusive Reservation</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Reservation Fee</td>
                                        <td><strong>₱<?php echo $row['rate'] . $var2;?></strong></td>
                                    </tr>
                                    <!-- <tr>
                                <td>Paymongo Charges(2.50%)</td>
                                <td><strong>₱<?php echo $paymongo_taxes;?></strong></td>
                            </tr>
                            <tr>
                                <td>Total Amount of Reservation</td>
                                <td><strong>₱<?php echo $finalTotal . $var2 ?></strong></td>
                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #6D9886;">
                            Add-Ons
                        </div>
                        <div class="card-body">
                            <table id="example" class="display nowrap" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $add_all = "SELECT SUM(productPrice) AS totalPurchased FROM mypurchased
                                    WHERE eid = '$eid'";
                                    $sum_result = mysqli_query($db,$add_all);
                                    $sum_row = mysqli_fetch_assoc($sum_result);
                                    $sum_output = $sum_row['totalPurchased'];
                                    ?>
                                            <?php
                                    $results = mysqli_query($db, "SELECT *
                                    FROM `mypurchased` 
                                    WHERE eid = '$eid'
                                    ");
                                                                    
                                    if (isset($_GET['eid'])) {
                                        $eid = $_GET['eid'];

                                    while ($row = $results->fetch_assoc()) { ?>

                                <tbody>
                                    <tr>
                                        <td style="width:fit-content;"><?php echo $row['productName']; ?></td>
                                        <td style="width:fit-content;"><?php echo $row['quantity']; ?></td>
                                        <td>₱<?php echo $row['productPrice']; ?></td>
                                    </tr>
                                    <?php
                            }
                            
                        }else {
                            echo '<h5 class="alert alert-danger">No purchased yet!</h5>';
                        }
                        
                            ?>
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td><strong>₱<?php echo $sum_output?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Rooms
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">SCAN QR CODE TO PAY </h5>(<span
                    class="text-warning"><i>No Additional Charge</i></span>)
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="rounded mx-auto d-block"
                            src="https://www.techopedia.com/images/uploads/aee977ce-f946-4451-8b9e-bba278ba5f13.jpg"
                            width="200" height="200" alt="">
                        <h6 class="text-center">Tim Gorgonio Morales</h6>
                    </div>
                    <div class="col-sm-8">
                        <form action="../../admin/processpay.php?" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-2 mt-2">
                                <label for="">Transaction Reference</label>
                                <input type="text" name="transacRef" id="" value="<?php echo $rand_transac_num;?>"
                                    class="form-control bg-transparent" readonly>
                            </div>
                            <div class="form-outline">
                                <?php 
                                    $sql = "SELECT customerdetails.cust_ID,e_reservation.eid,e_reservation.rate FROM customerdetails INNER JOIN e_reservation ON customerdetails.eid = e_reservation.eid WHERE e_reservation.eid = '$eid'";
                                    $results = $db -> query($sql);
                                    $rows = $results -> fetch_assoc();
                                    ?>

                                <input type="hidden" name="cust_ID" value="<?php echo $rows['cust_ID'];?>">
                                <input type="hidden" name="eid" value="<?php echo $rows['eid'];?>">
                                <label class="form-label" for="form1Example1">Gcash Full Name</label>
                                <input type="text" id="form1Example1" name="gcashFullname"
                                    class="form-control border border-3" />
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form1Example2">Gcash Number</label>
                                <input type="text" id="form1Example2" name="gcashNumber"
                                    class="form-control border border-3" />
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Mode of Payment</label>
                                <Select class="form-select form-select-lg" name="modeofpay" onchange="myMOP()" id="mop">
                                    <option value="">--Please select--</option>
                                    <option value="50% Downpayment">50% Downpayment</option>
                                    <option value="Full Payment">Full Payment</option>
                                </Select>
                            </div>
                            <div class="form-outline">
                                <label class="form-label" for="form1Example2">Send Screenshot</label>
                                <input type="file" id="form1Example2" name="gcashImage"
                                    class="form-control border border-3" />
                                <h4 class="modal-title mt-2" id="staticBackdropLabel">Amount to pay: <span
                                        class="badge bg-success">₱<?php echo $rate_purchased . $var2;?></span></h4><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../../includes/footer.php';?>