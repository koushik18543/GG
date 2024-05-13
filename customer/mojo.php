<?php
session_start();
// Assuming $_SESSION['cust_id'] is set and contains a value
// echo "<script>console.log('".$_SESSION['total-price']."');</script>";
include('config/dbcon.php');
$stmt = "SELECT * FROM customer WHERE id='{$_SESSION['cust-id']}'";
$res = mysqli_query($con,$stmt);
if(mysqli_num_rows($res) > 0)
{
    foreach($res as $row)
    {
        

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_4c3f885f6b8a31b8f8619b56c8a",
                  "X-Auth-Token:test_7675546fd2425840367113929e8"));
$payload = Array(
    'purpose' => 'GO GREEN PRODUCT',
    'amount' => $_SESSION['total-price'],
    'phone' => $row['phone'],
    'buyer_name' => $row['name'],
    'redirect_url' => 'http://localhost/GG/service/customer/orders.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => $row['email'],
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response=json_decode($response);
// echo '<pre>';
// print_r($response->payment_request->longurl);
$_SESSION['TID']=$response->payment_request->id;
header("location:".$response->payment_request->longurl);
die();
    }
}




?>