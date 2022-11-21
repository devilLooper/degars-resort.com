<?php
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
$eid = $_GET['eid'];
$get_hash = $_GET['hash'];
$sql = "SELECT * FROM `e_transaction` WHERE eid = '$eid'";
$res = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($res);

$transac_ref = $row['transac_ref'];

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
$match_url = 'http://localhost/degars/suc.php?eid='.$eid.'&transac_ref='.$transac_ref.'&hash='.$get_hash.'';
// echo $match_url;


//  echo $refundurl = 'https://getpaid.gcash.com/complaints?hash='.$get_hash.'';
$courl = 'https://getpaid.gcash.com/checkout/'.$get_hash.'';
if ($match_url == $CurPageURL) {
    $sql1 = "UPDATE `e_reservation` SET `status`='APPROVED',`checkouturl` ='$courl' WHERE eid = '$eid'";
    $res = mysqli_query($db, $sql1);

}

?>
<?php include 'includes/header.php';?>
<title>Transaction Complete</title>
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
</nav><br><br><br><br><br>
<section>
    <h1 class="text-center">THANK YOU FOR BOOKING!</h1>
    <p class="card-text text-danger text-center">Note: Take a screenshot/copy of your transaction code.</p>
    <div class="container-fluid col-lg-10 d-md-flex justify-content-center">
        <div class="card">
            <div class="card-body mx-5 my-3">
                <h2 class="text-primary text-center">
                    Transaction Code: 
                    <span id="myInput" class="text-dark">
                        <?php echo $transac_ref;?>
                </span>
                </h2><hr>
                <a href="checkres.php" class="btn btn-primary float-end">Check Reservation</a>
            </div>
        </div>
    </div>
</section>
<script>
    function myFunction() {
    // Get the text field
    var copyText = document.getElementById("myInput");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    // Alert the copied text
    alert("Copied the text: " + copyText.value);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>