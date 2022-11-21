<?php
    include "../../connection/conn.php";

    if (isset($_GET['p_transac_id'])) {
        $p_transac_id = $_GET['p_transac_id'];


        $sql ="DELETE pc.pcus_id,pr.pid
        FROM `p-transactions` AS p 
        LEFT JOIN pcustomer AS pc ON p.pcus_id = pc.pcus_id
        LEFT JOIN p_reservation AS pr ON p.pid = pr.pid
        WHERE p.p_transac_id = '$p_transac_id'";

        $result = $db->query($sql);
        if ($result == TRUE) {
            echo "Record deleted successfully.";
            header('Location: ../viewpackageres.php');
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    
    }
