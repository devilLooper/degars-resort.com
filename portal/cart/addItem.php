<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');


if(isset($_POST['submit'])){
    $cust_ID = $_POST['cust_ID'];
    $eid = $_POST['eid'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $quantity = $_POST['quantity'];

    $total = (int)$productPrice * (int)$quantity;

    $insert ="INSERT INTO `mypurchased` (`productName`, `productPrice`, `quantity`, `cust_ID`,`eid`) 
    VALUES ('$productName', '$total','$quantity', '$cust_ID', '$eid')";

    $execute = mysqli_query($db,$insert);
    if($execute == TRUE){
        header('Location: index.php?cust_ID='.$cust_ID.'&eid='.$eid.'');
    }
    else{
        echo "Error:". $sql . "<br>". $db->error;
    }

}


?>