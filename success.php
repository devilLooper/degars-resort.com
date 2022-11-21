<?php
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
$eid = $_GET['eid'];
 $sql = "SELECT * FROM `e_transaction` WHERE eid = '$eid'";
 $res = mysqli_query($db, $sql);
 $row = mysqli_fetch_assoc($res);

 $transac_ref = $row['transac_ref'];

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
$match_url = 'http://localhost/degars/success.php?eid='.$eid.'';

if ($match_url == $CurPageURL) {
    $sql1 = "UPDATE `e_reservation` SET `status`='APPROVED' WHERE eid = '$eid'";
    $res = mysqli_query($db, $sql1);
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Transacation Complete</title>
</head>

<body>
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="text-success display-5 fw-bold">Payment Success</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Thank you for booking with us! <br><i><strong>Take A screenshot of your transaction code</strong></i> <br>
            <a href="http://localhost/degars/checkres.php">Check Reservation</a>
                 <h1 class="text-danger"><?php echo $transac_ref; ?></h1>
                </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Home</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>