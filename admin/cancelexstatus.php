<?php
include "../connection/conn.php";
if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];

    $sqlUpdate = "UPDATE `e_reservation` SET `status` ='CANCELLED' WHERE  `eid`='$eid'";
    $sqlResult = $db->query($sqlUpdate); 
    if ($sqlResult) {
        echo"<script>alert(\"Delete Approved!\");</script>";
        header('Location: reservations.php');
    }
} else {
    echo "Already Approved!";
    header('Location: reservations.php');
}


?> 