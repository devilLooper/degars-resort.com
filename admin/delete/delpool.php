<?php
    include "../../connection/conn.php";
    if (isset($_GET['pool_ID'])) {
        $pool_ID = $_GET['pool_ID'];
        $sql = "DELETE FROM `pools` WHERE `pool_ID`='$pool_ID'";
        $result = $db->query($sql);
        if ($result == TRUE) {
            echo "Record deleted successfully.";
            header('Location: ../add_pool.php');
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    
    } 
    
    ?>
