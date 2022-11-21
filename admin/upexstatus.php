<?php
include "../connection/conn.php";
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];

    $sqlUpdate = "UPDATE `e_reservation` SET `status` ='APPROVED' WHERE  `eid`='$eid'";
    $sqlResult = $db->query($sqlUpdate); 
    if ($sqlResult) {
        echo"<script>alert(\"Reservation Approved!\");</script>";
        header('Location: reservations.php');
    }
} else {
    echo "Already Approved!";
    header('Location: reservations.php');
}
if (isset($_GET['eid'])) {
   $c =$_GET['eid'];
   $sqlUpdate1 = "UPDATE `e_reservation` SET `status` ='CANCELLED' WHERE  `eid`='$c'";
   $sqlResult1 = $db->query($sqlUpdate); 
   if ($sqlResult1) {
    echo"<script>alert(\"Reservation Approved!\");</script>";
    header('Location: reservations.php');
}
}

?> 