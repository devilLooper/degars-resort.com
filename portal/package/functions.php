<?php 
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
$fetchpkgdetails =" SELECT p.purchased_id,p.productName,p.productPrice,pres.pid,pres.resDate,pres.dueDate,pres.packageName,pres.rate,pcus.pcus_id,pcus.timeInserted
                            FROM mypurchased2 AS p 
                            INNER JOIN p_reservation AS pres ON p.pid = pres.pid
                            INNER JOIN pcustomer AS pcus ON p.pcus_id = pcus.pcus_id
                            ORDER BY pcus.timeInserted DESC LIMIT 1";

                            $sql1 = "SELECT pcus.pcus_id, pcus.firstName,pcus.lastName,pres.eventName,pres.resDate, pres.dueDate,pres.packageName,pres.rate 
                            FROM pcustomer AS pcus 
                            INNER JOIN p_reservation AS pres ON pcus.eid = pres.eid 
                            order by pcus.timeInserted DESC LIMIT 1";

$fetchresult = $db->query($fetchpkgdetails);
$row = $fetchresult->fetch_assoc();

$purchased_id = $row['purchased_id'];
$pid = $_GET['pid'];
$pcus_id = $row['pcus_id'];
$resDate = $row['resDate'];
$dueDate = $row['dueDate'];
$packageName = $row['packageName'];
$rate = $row['rate'];
$productName = $row['productPrice'];


$var2 = ".00";
$rand_transac_num = substr(md5(mt_rand()), 0,10);
$addedCharge = 2.50;
$paymongo_taxes = ($addedCharge / 100) * $rate = $row['rate'];;
$finalTotal = $paymongo_taxes + $rate = $row['rate'];;


$add_all = "SELECT SUM(productPrice) AS totalPurchased2 FROM mypurchased2
WHERE pid = '$pid'";
$sum_result = mysqli_query($db,$add_all);
$sum_row = mysqli_fetch_assoc($sum_result);
$totalpurchased = $sum_row['totalPurchased2'];
$rate_purchased = $rate = $row['rate']; +  $totalpurchased;
$include = ($addedCharge / 100) * $rate_purchased;
$display = $rate_purchased + $include;

?>