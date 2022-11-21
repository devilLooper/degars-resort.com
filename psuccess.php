<?php
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
$pid = $_GET['pid'];
$get_hash = $_GET['hash'];
$sql = "SELECT * FROM `p-transactions` WHERE pid = '$pid'";
$res = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($res);

$transac_ref = $row['transac_ref'];

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
$match_url = 'http://localhost/degars/suc.php?pid='.$pid.'&transac_ref='.$transac_ref.'&hash='.$get_hash.'';
echo $match_url;

$courl = 'https://getpaid.gcash.com/checkout/'.$get_hash.'';
if ($match_url == $CurPageURL) {
    $sql1 = "UPDATE `p_reservation` SET `status`='APPROVED',`checkouturl` ='$courl' WHERE pid = '$pid'";
    $res = mysqli_query($db, $sql1);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center my-lg-4">
        <div class="row col-lg-8 ">
            <div class="card-lg">
                <div class="card-header">Payment Success</div>
                <div class="card-body">
                    <a class="text-center text-lg-center" href="<?php echo 'https://getpaid.gcash.com/checkout/'.$get_hash.'';?>">
                        <?php echo 'https://getpaid.gcash.com/checkout/'.$get_hash.'';?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>