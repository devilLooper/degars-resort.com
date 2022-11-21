<?php
    include "../connection/conn.php";


    if (isset($_GET['eid']) && isset($_GET['cust_ID']) && isset($_GET['transac_ID'])) {
        $transac_ID = $_GET['transac_ID'];
        $eid = $_GET['eid'];
        $cust_ID = $_GET['cust_ID'];

        // $selectall = "SELECT t.transac_ID,c.cust_ID,e.eid
        // FROM e_transaction AS t
        // INNER JOIN customerdetails AS c ON t.cust_ID = c.cust_ID
        // INNER JOIN e_reservation AS e ON t.eid = e.eid
        // WHERE e.eid ='$eid'
        // AND c.cust_ID ='$cust_ID' 
        // AND t.transac_ID = '$transac_ID'";

        // $queryres = mysqli_query($db,$selectall);
        // $row = mysqli_fetch_array($queryres);
        // $transac_ID = $row['transac_ID'];
        // $eid = $row['eid'];
        // $cust_ID = $row['cust_ID'];

        // $sql = "DELETE t.transac_ID,c.cust_ID,e.eid
        // FROM e_transaction AS t
        // INNER JOIN customerdetails AS c ON t.cust_ID = c.cust_ID
        // INNER JOIN e_reservation AS e ON t.eid = e.eid  
        // WHERE e.eid ='$eid'
        // AND c.cust_ID ='$cust_ID' 
        // AND t.transac_ID = '$transac_ID'";
        $sql ="DELETE FROM e_transaction WHERE transac_ID = '$transac_ID' AND cust_ID = '$cust_ID' AND eid = '$eid'";
        $result = $db->query($sql);
        if ($result == TRUE) {
            echo "Record deleted successfully.";
            header('Location: reservations.php');
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    
    } 
    
    ?>
