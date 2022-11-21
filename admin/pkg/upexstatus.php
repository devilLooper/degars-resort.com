<?php
include "../../connection/conn.php";
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $sqlUpdate = "UPDATE `p_reservation` SET `status` ='APPROVED' WHERE  `pid`='$pid'";
    $sqlResult = $db->query($sqlUpdate); 
    if ($sqlResult) {
        echo"<script>alert(\"Reservation Approved!\");</script>";
        header('Location: ../viewpackageres.php');
    }
} else {
    echo "Already Approved!";
    header('Location: reservations.php');
}
// if (isset($_GET['pid'])) {
//    $c =$_GET['pid'];
//    $sqlUpdate1 = "UPDATE `p_reservation` SET `status` ='CANCELLED' WHERE  `pid`='$c'";
//    $sqlResult1 = $db->query($sqlUpdate); 
//    if ($sqlResult1) {
//     echo"<script>alert(\"Reservation Approved!\");</script>";
//     header('Location: reservations.php');
// }
// }

?> 