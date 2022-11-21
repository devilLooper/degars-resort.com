<?php 
include "../connection/conn.php";

    if (isset($_POST['update'])) {
        $cottageType_ID = $_POST['cottageType_ID'];
        $cottageName = $_POST['cottageName'];
        $description = $_POST['description'];
        $price = $_POST['price'];


        $sql = "UPDATE `cottagetype` SET `cottageName`='$cottageName',`description`='$description',`price`='$price' WHERE `cottageType_ID`='$cottageType_ID'"; 
        $result = $db->query($sql); 
        if ($result == TRUE){
            echo"<script>alert(\"Updated succesfully!\");</script>";
            header('Location: add_cottages.php');
        }
        else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }

    } 

if (isset($_GET['cottageType_ID'])) {
    $cottageType_ID = $_GET['cottageType_ID']; 
    $sql = "SELECT * FROM `cottagetype` WHERE `cottageType_ID`='$cottageType_ID'";
    $result = $db->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $cottageName = $row['cottageName'];
            $description = $row['description'];
            $price = $row['price'];
            $cottageType_ID = $row['cottageType_ID'];
        }
    } else{ 
        header('Location: ../add_cottages.php');
    } 

}

?> 