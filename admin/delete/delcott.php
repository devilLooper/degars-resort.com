<?php 

include "../../connection/conn.php";

if (isset($_GET['cottageType_ID'])) {
    $cottageType_ID = $_GET['cottageType_ID'];
    $sql = "DELETE FROM `cottageType` WHERE `cottageType_ID`='$cottageType_ID'";
    $result = $db->query($sql);
    if ($result == TRUE) {
    echo "Record deleted successfully.";
    header('Location: ../add_cottages.php');
    
}else{
    echo "Error:" . $sql . "<br>" . $db->error;
}

} 

?>