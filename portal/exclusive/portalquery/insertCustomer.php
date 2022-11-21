<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'manorsdb');
    $get_info = mysqli_query($db, "SELECT * FROM `customerdetails` WHERE cust_ID ='$cust_ID' AND firstName='$firstName' AND lastName='$lastName'");
    $row = mysqli_fetch_array($get_info);

    if (isset($_POST['submit'])) {
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNum = $_POST['phoneNum'];
        $address = $_POST['address'];
        $emailAddress = $_POST['emailAddress'];
        $eid = $_POST['eid'];
        $_SESSION['firstName'] = $_POST['firstName'];
        $sql = "INSERT INTO `customerdetails`(`firstName`, `lastName`, `phoneNum`, `address`, `emailAddress`, `eid`)
                VALUES ('$firstName','$lastName','$phoneNum','$address','$emailAddress','$eid')";

        $result = $db->query($sql);
        if ($result == true) {
            echo '<script>alert("Record added successfully!"</script>';
            header('Location:../proceed_to_payment.php?cust_ID='.$_SESSION['cust_ID'].'&eid='.$eid.'&$firstName='.$firstName.'&lastName='.$lastName.'');
        } else {
            echo "Error:". $sql . "<br>". $db->error;
        }
    }
