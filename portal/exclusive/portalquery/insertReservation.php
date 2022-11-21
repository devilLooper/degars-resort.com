<?php

$db = mysqli_connect('localhost', 'root', '', 'manorsdb');

    if (isset($_POST['submit'])) {
        $datetoday = date('Y-m-d');
        $eventName    = $_POST['eventName'];
        $resDate      = $_POST['resDate'];
        $dueDate      = date('Y-m-d', strtotime('-3 days', strtotime($resDate)));
        $poolType     = $_POST['poolType'];
        $rate         = $_POST['rate'];
        $status       = "PENDING";
        $checkouturl = 'checkout url unavailable';
        $_SESSION['eventName'] = $_POST['eventName'];

        $sql = "INSERT INTO `e_reservation`(`eventName`, `resDate`,`dueDate`, `poolType`, `rate`,`status`,`checkouturl`) 
                VALUES ('$eventName','$resDate','$dueDate','$poolType','$rate','$status','$checkouturl')";

        $result = $db->query($sql);
        if ($result == true) {
            echo '<script>alert("Reservation Added successfully!"</script>';
            header('Location:../customer.php?eid='.$_SESSION['eid'].'&eventName='.$_SESSION['eventName'].'');
        } else {
            echo "Error:". $sql . "<br>". $db->error;
        }
    }

    //     $fetch_res_stats = "SELECT * FROM e_reservations";
    //     $fetch_result = mysqli_query($db, $fetch_res_stats);
    //     $fetch_res_row = mysqli_fetch_assoc($fetch_res_row);
    //     $datetoday = date('Y-m-d');
    //     $resDate = $fetch_res_row['resDate'];
    //     $status = $fetch_res_row['status'];
    //     $dueDate = date('Y-m-d', strtotime('-3 days', strtotime($resDate)));
    //     if ($datetoday == $dueDate && $status = "PENDING") {
    //         $updatestats = "UPDATE e_reservation SET status = 'CANCELLED'";
    //     } else {
    //         $updatestatsz = "UPDATE e_reservation SET status = 'APPROVED'";
    // }

