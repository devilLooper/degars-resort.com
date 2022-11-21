<?php
    session_start();
    unset($_SESSION["admin_ID"]);
    unset($_SESSION["adminUsername"]);
    header("Location:../login.php");
?>