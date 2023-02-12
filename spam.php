<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.apilayer.com/spamchecker?threshold=5.0",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: text/plain",
    "apikey: IaLGJZTz8ucT6XEoHDUxjaBDhwcy53js"
  ),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"This%20is%20not%20a%20spam%20message"
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>