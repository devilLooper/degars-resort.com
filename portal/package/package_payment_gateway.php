<?php 
error_reporting(E_ALL);
$db = mysqli_connect('localhost', 'root', '', 'manorsdb');
if (isset($_POST['submit'])) {

    $transac_ref = $_POST['transac_ref'];
    $pid = $_POST['pid'];
    $pcus_id = $_POST['pcus_id'];
    $payment_method = $_POST['payment_method'];
    $firstlast = $_POST['firstlast'];
    $phoneNum = $_POST['phoneNum'];
    $emailAddress = $_POST['emailAddress'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $totalrate = $_POST['totalrate'];
    $added_charge = $_POST['added_charge'];
    $add_ons = $_POST['add_ons'];
    $amountRecieved = $_POST['amountReceived'];
    
    $sql = "INSERT INTO `p-transactions` (`transac_ref`, `pid`, `pcus_id`, `payment_method`, `mode_of_payment`, `totalrate`, `added_charge`, `add_ons`, `amountReceived`) VALUES ('$transac_ref', '$pid', '$pcus_id', '$payment_method', '$mode_of_payment', '$totalrate', '$added_charge','$add_ons', '$amountRecieved')";
    $res = mysqli_query($db,$sql);

}
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://g.payx.ph/payment_request',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
    'x-public-key' => 'pk_43d745335708ee03c64ae210176e2d2b',
    'amount' => ''.$amountRecieved.'',
    'fee' => ''.$added_charge.'',
    'merchantlogourl' => 'https://img.fontspace.co/preview/d/4b904060b8ca4bc5a21708db81299a08/beach-resort-font-design-graphic-17809-1280x720.png',
    'merchantname'=>'DEGARS RESORT',
    'expiry' => '1',
    'customername'=>''.$firstlast.'',
    'customeremail'=>''.$emailAddress.'',
    'customermobile'=>''.$phoneNum.'',
    'webhooksuccessurl'=>'http://degarsresort.epizy.com/success.php',
    'redirectsuccessurl' => 'http://localhost/degars/psuccess.php?pid='.$pid.'&transac_ref='.$transac_ref.'',
    'redirectfailurl' => 'http://localhost/degars/suc.php',  
    'description' => 'Degars Resort Payment'
    ),
  ));


  $response = curl_exec($curl);
  if ($e= curl_error($curl)) {
    echo $e;
  }else{
    $decoded = json_decode($response, true);
    $redirect = $decoded['data']['checkouturl'];
    echo "Redirecting";
    header('Refresh: 5;URL='.$redirect);
  }
  curl_close($curl);
?>