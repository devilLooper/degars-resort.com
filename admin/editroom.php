<?php
include "../connection/conn.php";

if (isset($_POST['update'])) {
    $room_ID = $_POST['room_ID'];
    $roomName = $_POST['roomName'];
    $description = $_POST['description'];
    $roomRates = $_POST['roomRates'];


    $sql = "UPDATE `rooms` SET `roomName`='$roomName',`description`='$description',`roomRates`='$roomRates' WHERE `room_ID`='$room_ID'";
    $result = $db->query($sql);
    if ($result == true) {
        echo"<script>alert(\"Updated succesfully!\");</script>";
        header('Location: add_rooms.php');
    } else {
        echo "Error:" . $sql . "<br>" . $db->error;
    }
}

if (isset($_GET['room_ID'])) {
    $room_ID = $_GET['room_ID'];
    $sql = "SELECT * FROM `rooms` WHERE `room_ID`='$room_ID'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomName = $row['roomName'];
            $description = $row['description'];
            $roomRates = $row['roomRates'];
            $room_ID = $row['room_ID'];
        }
    } else {
        header('Location: ../add_rooms.php');
    }
}

?> 