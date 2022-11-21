<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');

// $resdate = date('2022-08-15');
// $duedate = date('Y-m-d', strtotime('-3 days', strtotime($resdate)));

// $sql = "INSERT INTO testinsertdate (resdate, duedate) 
//         VALUES ('$resdate', '$duedate')";
// if ($db->query($sql) === TRUE) {
//         echo "New record created successfully";
//         } else {
//         echo "Error: " . $sql . "<br>" . $db->error;
//         }

        $datetoday = date('Y-m-d');
        $resdate = date('2022-11-15');
        $status = "PENDING";
        $duedate = date('Y-m-d', strtotime('-3 days', strtotime($resdate)));
        if ($datetoday == $duedate && $status = "PENDING") {
                $updatestats = "UPDATE";
                echo $duedate;
                echo 'Reservation Cancelled';       
        } else {
                echo 'Reservation Approved';
        }
        
?>
