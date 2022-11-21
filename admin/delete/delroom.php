<?php 

include "../../connection/conn.php";

if (isset($_GET['room_ID'])) {
    $room_ID = $_GET['room_ID'];
    $sql = "DELETE FROM `rooms` WHERE `room_ID`='$room_ID'";
    $result = $db->query($sql);
    if ($result == TRUE) {
    echo "Record deleted successfully.";
    header('Location: ../add_rooms.php');
}else{
    echo "Error:" . $sql . "<br>" . $db->error;
}

} 

?>