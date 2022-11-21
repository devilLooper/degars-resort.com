<?php
session_start();
    include '../../connection/conn.php';
    include '../../includes/header.php';
    include '../validation.php';
    
    if(!isset($_SESSION['firstName']) && ($_SESSION['lastName']))
    {
        echo '<script type="text/javascript"> window. onload = function () { alert("Please fill up customer details first!"); } </script>';
        header("location:../customer.php");
    }
?>
<title>Payment</title>
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
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center pb-5">
                    <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
                        <div class="py-4 d-flex flex-row">
                            <?php
                            $sql = "SELECT customerdetails.cust_ID, customerdetails.firstName,customerdetails.lastName,e_reservation.eventName,e_reservation.resDate,e_reservation.poolType,e_reservation.rate FROM customerdetails INNER JOIN e_reservation ON customerdetails.eid = e_reservation.eid order by timeInserted DESC LIMIT 1";
                            
                            $var2 = ".00";
                            $rand_transac_num = substr(md5(mt_rand()), 0,10);
                            $result = $db -> query($sql);
                            $row = $result -> fetch_assoc();
                            $addedCharge = 2.50;
                            $paymongo_taxes = ($addedCharge / 100) * $row['rate'];
                            $finalTotal = $paymongo_taxes + $row['rate'];

                            ?>
                            <h5><span class="far fa-check-square pe-2"></span><b>DEGARS RESORT</b> |</h5>
                            <span class="ps-2">Transaction ID: <strong><?php echo $rand_transac_num;?></strong> </span>
                        </div>
                        <h4 class="text-success"><?php echo $row['firstName'];?> <?php echo $row['lastName'];?></h4>
                        <hr />
                        <div class="pt-2">
                            <div class="form-group">
                                <div>
                                    <label for="">Reservation Fee</label>
                                    <input type="text" class="form-control" name="rate"
                                        value="<?php echo $row['rate'] . $var2;?>" readonly>
                                </div>
                                <div class="form-input">
                                    <select class="form-select form-select-lg" aria-label="Default select example">
                                        <option value="50% Downpayment" selected>50% Downpayment</option>
                                        <option value="Full Payment" selected>Full Payment</option>
                                    </select>
                                </div>
                                <div class="form-input">
                                    <label for="">Payment Method</label>
                                    <select class="form-select form-select-lg" aria-label="Default select example">
                                        <option selected><img
                                                src="https://getcash.ph/wp-content/uploads/2021/01/Transparent-1280-x-720-1024x576.png"
                                                alt="" srcset="" width="40" heigth="40"></i>Gcash</option>
                                    </select>
                                </div>
                                <div class="ms-auto">
                                    <p class="text-primary">

                                    </p>
                                </div>
                            </div>
                            <p>
                                Make sure you have remaining Gcash balance before you proceed.
                            </p>
                            <form class="pb-3" action="../../payProcess.php?amount=<?php echo $row['rate']; ?>"
                                method="POST">
                                <div class="d-flex flex-row pb-3">
                                    <div class="d-flex align-items-center pe-2">
                                        <input class="form-check-input" type="radio" name="radioNoLabel"
                                            id="radioNoLabel1" value="" onclick="addCharge()" aria-label="..."
                                            checked />
                                    </div>
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img src="https://getcash.ph/wp-content/uploads/2021/01/Transparent-1280-x-720-1024x576.png"
                                                alt="" srcset="" width="40" heigth="40"></i>Gcash
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex flex-row">
                                    <div class="d-flex align-items-center pe-2">
                                        <input type="hidden" name="transac_ref" value="<?php echo $rand_transac_num;?>">
                                        <input type="hidden" name="rate" value="<?php echo $row['rate'] . $var2;?>">
                                        <input class="form-check-input" type="radio" name="radioNoLabel"
                                            id="radioNoLabel2" value="" aria-label="..." />
                                    </div>
                                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                                        <p class="mb-0">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Maya_logo.svg/2560px-Maya_logo.svg.png"
                                                alt="" srcset="" width="40" heigth="40"></i> Maya
                                        </p>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
                                    <a href="../cart/index.php?cust_ID=<?php echo $row['cust_ID']; ?>"
                                        class="btn btn-outline-dark">Purchased Products</a>
                                    <button class="btn btn-outline-success" name="submit" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                            <path
                                                d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                        </svg>
                                        Pay Now</button>
                                </div>
                                <hr>
                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Pay Via QR Code
                                </a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-4 offset-xl-1">
                        <div class="py-4 d-flex justify-content-end">
                            <h6><a href="../index.html">Cancel and return to website</a></h6>
                        </div>
                        <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
                            <div class="p-2 me-3">
                                <h4>Reservation Overview</h4>
                                <hr>
                            </div>
                            <div class="p-2 d-flex">
                                <div class="col-8">Reservation Date</div>
                                <div class="ms-auto"><?php echo $row['resDate'];?></div>
                            </div>

                            <div class="p-2 d-flex">
                                <div class="col-8">Total Amount</div>
                                <input type="hidden" id="totalAmount" value="<?php echo $row['rate'] . $var2;?>">
                                <div class="ms-auto"><?php echo $row['rate'] . $var2;?></div>
                            </div>
                            <div class="p-2 d-flex">
                                <div class="col-8">Addtional Charges for paymongo (2.50%) </div>
                                <div class="ms-auto"></div>
                            </div>
                            <div class="border-top px-2 mx-2"></div>
                            <div class="p-2 d-flex pt-3">
                                <div class="col-8"><b>Total</b></div>
                                <div class="ms-auto">
                                    <p id="displayTotal"><?php echo $finalTotal ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="staticBackdropLabel">Scan QR Code</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-lg">
                    <div class="row">
                        <div class="col-lg-4">
                            <img class="rounded mx-auto d-block"
                                src="https://www.techopedia.com/images/uploads/aee977ce-f946-4451-8b9e-bba278ba5f13.jpg"
                                width="200" height="200" alt="">
                            <h6 class="text-center">Tim Gorgonio Morales</h6>
                            <hr>
                        </div>
                        <!-- Payment Via Qr Code -->
                        <div class="col-lg">
                            <form action="processpay.php" method="post" enctype="multipart/form-data">
                                <div class="form-outline">
                                    <?php 
                                    $sql = "SELECT customerdetails.cust_ID,e_reservation.eid,e_reservation.rate FROM customerdetails INNER JOIN e_reservation ON customerdetails.eid = e_reservation.eid order by timeInserted DESC LIMIT 1";
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
                                <div class="form-outline">
                                    <label class="form-label" for="form1Example2">Send Screenshot</label>
                                    <input type="file" id="form1Example2" name="gcashImage"
                                        class="form-control border border-3" />
                                    <h4 class="modal-title mt-2" id="staticBackdropLabel">Amount to pay: <span
                                            class="badge bg-success">₱<?php echo $row['rate'] . $var2;?></span></h4><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include '../../includes/footer.php';
?>