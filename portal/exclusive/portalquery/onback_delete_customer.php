<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
$on_delete  = "SELECT cust_ID FROM customerdetails ORDER BY timeInserted DESC LIMIT 1";

if (isset($_GET['cust_ID'])) {
    $cust_ID = $_GET['cust_ID'];
    $sql = "DELETE FROM `customerdetails` WHERE cust_ID = '$cust_ID' ";
    $result = $db->query($sql);
    if ($result == TRUE) {
    echo "Reloading..";
    header('Refresh: 2;URL=http://localhost/degars/portal/exclusive/customer.php');
    
}else{
    echo "Error:" . $sql . "<br>" . $db->error;
}

} 

?>