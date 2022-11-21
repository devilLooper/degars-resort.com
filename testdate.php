<?php
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');

$sqlfetch ="SELECT * FROM test";
$result = $db->query($sqlfetch);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $status = $row['status']; //status if paid or unpaid
            $dueDate = $row['dueDate'];//
            $resDate = $row['resDate']; //reservation date
            $paymentMode = $row['paymentMode']; // mode if 50% or full payment.
            $totalpayment = $row['totalpayment']; //total amount
            $receivedAmount =$row['receivedAmount']; // amount recieved
        }
    }
    $date = date('Y-m-d', strtotime('-3 days', strtotime($resDate)));
    if ($status = $date) {
        echo 'Unpaid';
        }
         {
            # code...
    }
?>