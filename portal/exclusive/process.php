
<?php
include '../../connection/conn.php';
require_once('../../autoload.php');
$client = new \GuzzleHttp\Client();


function clean($string){
    $string = str_replace(' ', '', $string);
    $string = str_replace('.', '', $string);
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

try {

    $value = $_POST['rate'];
    $msg = '<h3 style="text-align:center; margin-top: 10em;">Please wait redirecting in 3 seconds...</h3>';
    $amount =  clean($value);

    
    $response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
        'body' => '{"data":{"attributes":{"amount":'.$amount.',"redirect":{"success":"https://degarsmanor.000webhostapp.com/degarsmanor/success.php","failed":"https://degarsmanor.000webhostapp.com/degarsmanor/failed.php"},"type":"gcash","currency":"PHP"}}}',
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
<?php include '../../includes/header.php' ?>