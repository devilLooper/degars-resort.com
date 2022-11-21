<?php
include "../../connection/conn.php";
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $sqlUpdate = "UPDATE `p_reservation` SET `status` ='CANCELLED' WHERE  `pid`='$pid'";
    $sqlResult = $db->query($sqlUpdate); 
    if ($sqlResult) {
        echo"<script>alert(\"Delete Approved!\");</script>";
        header('Location: ../viewpackageres.php');
    }
} else {
    echo "Already Approved!";
    header('Location: reservations.php');
}


?> 