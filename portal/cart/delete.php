<?php
    $db = mysqli_connect('localhost', 'root', '', 'manorsdb');

    if (isset($_GET['purchased_id']) && isset($_GET['cust_ID']) && isset($_GET['eid'])) {
        $purchased_id = $_GET['purchased_id'];
        $cust_ID = $_GET['cust_ID'];
        $eid = $_GET['eid'];

        $sql = "DELETE FROM `mypurchased` WHERE `purchased_id`='$purchased_id'";
        $result = $db->query($sql);
        if ($result == TRUE) {
            echo "Record deleted successfully.";
            header('Location: ../exclusive/proceed_to_payment.php?cust_ID='.$cust_ID.'&eid='.$eid.'');
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    
    } 
    
    ?>
