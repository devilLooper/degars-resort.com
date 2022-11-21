<?php

include '../../connection/conn.php';
if(isset($_POST['submit'])){
    $cust_ID = $_POST['cust_ID'];
    $eid = $_POST['eid'];
    $gcashFullname = $_POST['gcashFullname'];
    $transac_ref = $_POST['transacRef'];
    $gcashNumber = $_POST['gcashNumber'];
    $modeofpay = $_POST['modeofpay'];
    $gcashImage = $_FILES['gcashImage'];
    $status = 'PENDING';
    
    $imagefilename = $gcashImage['name'];
    $imagefileerror = $gcashImage['error'];
    $imagefiletemp = $gcashImage['tmp_name'];
    $filename_separate = explode('.',$imagefilename);
    $filename_extension = strtolower(end($filename_separate));

    $extension =array('jpeg','jpg','png');
    if(in_array($filename_extension,$extension)){
        $upload_image = '../images/'. $imagefilename;
        move_uploaded_file($imagefiletemp, $upload_image);
        $sql = "INSERT INTO `payviaqr` (`cust_ID`, `eid`,`transac_ref`, `gcashFullName`, `gcashNumber`,`modeofpay`,`gcashImage`,`status`)
                VALUES ('$cust_ID', '$eid','$transac_ref', '$gcashFullname', '$gcashNumber','$modeofpay', '$upload_image','$status')";
        $result=$db->query($sql);
        if($result){
            ?>
            <script>
                swal("Good job!", "You clicked the button!", "success");
            </script>
            <?php
            header('Location:payqrsuccess.php?eid='.$eid.'&cust_ID='.$cust_ID.'&firstName='.$_SESSION["firstName"].'');
        }
    }

}
?>