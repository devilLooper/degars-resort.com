<?php 
include "../connection/conn.php";

    if (isset($_POST['updateProduct']))
    {
        
        $productName = $_POST['productName'];
        $productCategory = $_POST['productCategory'];
        $stockQty = $_POST['stockQty'];
        $buy_price = $_POST['buy_price'];
        $sale_price = $_POST['sale_price'];

        $sql = " UPDATE `product` SET `productName`='$productName',`productCategory`='$productCategory',`stockQty`='[$stockQty]',`buy_price`='[$buy_price]',`sale_price`='[$sale_price]'WHERE `product_Id`='$product_Id'";


        $result = $db->query($sql); 
        if ($result == TRUE) {
            echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    } 

    if (isset($_GET['product_Id'])) 
    {
        $product_Id = $_GET['product_Id'];
        $sql = "SELECT * FROM `product` WHERE `product_Id`='$product_Id'";
        $result = $db->query($sql);


        if ($result->num_rows > 0) 
        {        
            while ($row = $result->fetch_assoc())
            {
                $productName = $row['productName'];
                $productCategory = $row['productCategory'];
                $stockQty = $row['stockQty'];
                $buy_price = $row['buy_price'];
                $sale_price = $row['sale_price'];
                $product_Id = $row['product_Id'];
            }

            }
            else
            { 
            header('Location: ../add_product.php');
            
        } 

    }

?>