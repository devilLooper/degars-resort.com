<?php 
session_start(); 
include "connection/conn.php";
if (isset($_POST['login'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
    $adminUsername = validate($_POST['adminUsername']);
    $adminPass = validate($_POST['password']);
    if (empty($adminUsername)) {
        header("Location: login.php?error=User Name is required");
        exit();
    }else if(empty($adminPass)){
        header("Location: login.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM admin WHERE adminUsername='$adminUsername' AND adminPass='$adminPass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $adminUsername && $row['password'] === $adminPass) {
                echo "Logged in!";
                $_SESSION['adminUsername'] = $row['adminUsername'];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['admin_ID'] = $row['admin_ID'];
                header("Location: admin/dashboard.php");
                exit();
            }else{
                header("Location: login.php?error=Incorect User name or password");
                exit();
            }
        }
    }
}