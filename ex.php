<?php

$curl = curl_init();

$url='https://g.payx.ph/payment_request?x-public-key=pk_0eb0e86636c1eefa25d5696a6af46133&amount=2.00&description=testonly&merchantname=Degars Resort&webhooksuccessurl=https://degarsmanor.000webhostapp.com/degarsmanor/success.php&webhookfailurl=https://degarsmanor.000webhostapp.com/degarsmanor/failed.php';

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($curl);

if ($e = curl_error($curl)) {
  echo $e;
} else {
  $decode = json_decode($resp, true);
  print_r($decode);
}

curl_close($curl);

