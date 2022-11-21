<?php
    include "../../connection/conn.php";

    if (isset($_GET['product_Id'])) {
        $productid = $_GET['product_Id'];
        $sql = "DELETE FROM `product` WHERE `product_Id`='$productid'";
        $result = $db->query($sql);
        if ($result == TRUE) {
            echo "Record deleted successfully.";
            header('Location: ../add_product.php');
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    
    } 
    
    ?>
