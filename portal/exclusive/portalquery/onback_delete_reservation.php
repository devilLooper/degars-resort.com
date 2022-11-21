<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
$on_delete  = "SELECT eid FROM e_reservation ORDER BY resCreated DESC LIMIT 1";

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $sql = "DELETE FROM `e_reservation` WHERE eid = '$eid' ";
    $result = $db->query($sql);
    if ($result == TRUE) {
    echo "Reloading..";
    header('Refresh: 2;URL=http://localhost/degars/portal/exclusive/exclusive-booking.php');
    
}else{
    echo "Error:" . $sql . "<br>" . $db->error;
}

} 

?>