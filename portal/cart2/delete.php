<?php
    $db = mysqli_connect('localhost', 'root', '', 'manorsdb');

    if (isset($_GET['purchased_id']) && isset($_GET['pcus_id']) && isset($_GET['pid'])) {
        $purchased_id = $_GET['purchased_id'];
        $pcus_id = $_GET['pcus_id'];
        $pid = $_GET['pid'];

        $sql = "DELETE FROM `mypurchased2` WHERE `purchased_id`='$purchased_id'";
        $result = $db->query($sql);
        if ($result == TRUE) {
            echo "Record deleted successfully.";
            header('Location: ../package/proceed_to_payment.php?pcus_id='.$pcus_id.'&pid='.$pid.'');
        }else{
            echo "Error:" . $sql . "<br>" . $db->error;
        }
    
    } 
    
    ?>
