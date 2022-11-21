<?php
include "../connection/conn.php";
if (isset($_GET['payid'])) {
    $payid = $_GET['payid'];
    $fetchStatus = "SELECT `payid`,`status` FROM payviaqr WHERE `payid`='$payid'";
    $fetchResult = $db->query($fetchStatus);
    $row = mysqli_fetch_assoc($fetchResult);

    $payid = $row['payid'];
    $forSwitch = $row['status'];


    $sqlUpdate = "UPDATE `payviaqr` SET `status` ='APPROVED' WHERE `payid`='$payid'";
    $sqlResult = $db->query($sqlUpdate); 
    if ($sqlResult == TRUE && $forSwitch = 'PENDING') {
        echo"<script>alert(\"Reservation Approved!\");</script>";
        header('Location: reservations.php');
    }
} else {
    echo "Already Approved!";
    header('Location: reservations.php');
}


?> 