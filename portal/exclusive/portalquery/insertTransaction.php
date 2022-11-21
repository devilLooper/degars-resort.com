<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');

if (isset($_POST['submit'])) {

    $transac_ref = $_POST['transac_ref'];
    $eid = $_POST['eid'];
    $cust_ID = $_POST['cust_ID'];
    $payment_method = $_POST['payment_method'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $totalrate = $_POST['totalrate'];
    $added_charge = $_POST['added_charge'];
    $add_ons = $_POST['add_ons'];
    $amountRecieved = $_POST['amountReceived'];
    $checkouturl = '';
    $sql = "INSERT INTO `e_transaction` (`transac_ref`, `eid`, `cust_ID`, `payment_method`, `mode_of_payment`, `totalrate`, `added_charge`,`add_ons`,`amountReceived`,`checkouturl`) VALUES ('$transac_ref', '$eid ', '$cust_ID', '$payment_method', '$mode_of_payment', '$totalrate', '$added_charge', '$add_ons','$amountRecieved','$checkouturl')";
    $res = mysqli_query($db,$sql);
    if ($res) {
        echo "Transaction Complete";
        header('Location: ../../success.php');
    } else {
        echo 'error';
    }
    
    

}
?>