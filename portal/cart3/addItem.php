<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');


if(isset($_POST['submit'])){
    $pcus_id = $_POST['pcus_id'];
    $pid = $_POST['pid'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $quantity = $_POST['quantity'];

    $total = (int)$productPrice * (int)$quantity;

    $insert ="INSERT INTO `mypurchased2` (`productName`, `productPrice`, `quantity`, `pcus_id`,`pid`) 
    VALUES ('$productName', '$total','$quantity', '$pcus_id', '$pid')";

    $execute = mysqli_query($db,$insert);
    if($execute == TRUE){
        header('Location: index.php?pcus_id='.$pcus_id.'&pid='.$pid.'');
    }
    else{
        echo "Error:". $sql . "<br>". $db->error;
    }

}


?>