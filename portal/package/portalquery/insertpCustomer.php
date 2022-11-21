<?php

    $db = mysqli_connect('localhost', 'root', '', 'manorsdb');
    $get_info = mysqli_query($db, "SELECT * FROM `pcustomer` WHERE firstName='$firstName' AND lastName='$lastName'");
    $row = mysqli_fetch_array($get_info);

    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNum = $_POST['phoneNum'];
        $address = $_POST['address'];
        $emailAddress = $_POST['emailAddress'];
        $pid = $_POST['pid'];

        $sql = "INSERT INTO `pcustomer`(`firstName`, `lastName`, `phoneNum`, `address`, `emailAddress`, `pid`)
                VALUES ('$firstName','$lastName','$phoneNum','$address','$emailAddress','$pid')";

        $result = $db->query($sql);
        if ($result == true) {
            echo '<script>alert("Record added successfully!"</script>';
            header('Location:../proceed_to_payment.php?pid='.$pid.'&firstName='.$firstName.'&lastName='.$lastName.'');
        } else {
            echo "Error:". $sql . "<br>". $db->error;
        }
    }
