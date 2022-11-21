<?php 

include "../connection/conn.php";

    if (isset($_POST['update'])) {
        $pool_ID = $_POST['pool_ID'];
        $poolName = $_POST['poolName'];
        $description = $_POST['description'];
        $poolRates = $_POST['poolRates'];


        $sql = "UPDATE `pools` SET `poolName`='$poolName',`description`='$description',`poolRates`='$poolRates' WHERE `pool_ID`='$pool_ID'"; 
        $result = $db->query($sql); 
        if ($result == TRUE){
            echo "Record updated successfully.";
            header('Location: add_pool.php');
        }
        else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }

    } 

if (isset($_GET['pool_ID'])) {
    $pool_ID = $_GET['pool_ID']; 
    $sql = "SELECT * FROM `pools` WHERE `pool_ID`='$pool_ID'";
    $result = $db->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $poolName = $row['poolName'];
            $description = $row['description'];
            $poolRates = $row['poolRates'];
            $pool_ID = $row['pool_ID'];
        }
    } else{ 
        header('Location: ../add_pool.php');
    } 

}

?> 