
<?php
include 'connection/conn.php';
require_once('vendor/autoload.php');
$client = new \GuzzleHttp\Client();

if (isset($_POST['submit'])) {

    $transac_ref = $_POST['transac_ref'];
    $eid = $_POST['eid'];
    $cust_ID = $_POST['cust_ID'];
    $payment_method = $_POST['payment_method'];
    $mode_of_payment = $_POST['mode_of_payment'];
    $totalrate = $_POST['totalrate'];
    $added_charge = $_POST['added_charge'];
    $add_ons = $_POST['add_ons'];
    $amountRecieved = $_POST['amountReceived'];
    
    $sql = "INSERT INTO `e_transaction` (`transac_ref`, `eid`, `cust_ID`, `payment_method`, `mode_of_payment`, `totalrate`, `added_charge`, `add_ons`,`amountReceived`) VALUES ('$transac_ref', '$eid ', '$cust_ID', '$payment_method', '$mode_of_payment', '$totalrate', '$added_charge','$add_ons', '$amountRecieved')";
    $res = mysqli_query($db,$sql);

    
}

function clean($string){
    $string = str_replace(' ', '', $string);
    $string = str_replace('.', '', $string);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

try {

    $value = $_POST['amountReceived'];
    $msg = '<h3 style="text-align:center; margin-top: 10em;">Please wait redirecting in 3 seconds...</h3>';
    $amount =  clean($value);
    $eid = $_GET['eid'];


    
    $response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
        'body' => '{"data":{"attributes":{"amount":'.$amount.',"redirect":{"success":"http://localhost/degars/success.php?eid='.$eid.'","failed":"https://degarsmanor.000webhostapp.com/degarsmanor/failed.php?cust_ID='.$cust_ID.'&eid='.$eid.'"},"type":"gcash","currency":"PHP"}}}',
        'headers' => [
        'accept' => 'application/json',
        'authorization' => 'Basic c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY6c2tfbGl2ZV9EOThaY0h3ajVZMzU1SDQxMWtRYUVkQlY=',
        'content-type' => 'application/json',
    ],
    ]);

    $data = json_decode($response->getBody() , true);
        $redirect = $data['data']['attributes']['redirect']['checkout_url'];
        echo "<h3>$msg</h3>";
        header('Refresh: 1;URL='.$redirect);

} catch (GuzzleHttp\Exception\ClientException $e) {
        $response = $e->getResponse();
        $responseBodyAsString = $response->getBody()->getContents();
        $error = json_decode($responseBodyAsString, true);
        print_r($error['errors'][0]['detail']);

    }
?>



<?php include 'includes/header.php' ?>