<?php
ob_start();
session_start();

// Ensure session variables are set before using them
if (!isset($_SESSION['cust-id']) || !isset($_SESSION['total-price'])) {
    die('Required session variables are missing.');
}

include('config/dbcon.php');

// Fetch customer data based on the session customer ID
$stmt = "SELECT * FROM customer WHERE id='{$_SESSION['cust-id']}'";
$res = mysqli_query($con, $stmt);

if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);  // You don't need a loop if there's only one result

    // Initialize cURL session for Instamojo API
    $ch = curl_init();

    // Instamojo API request URL
    curl_setopt($ch, CURLOPT_URL, 'https://api.instamojo.com/v2/payment_requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    // Set the API key and Auth token for Instamojo
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "X-Api-Key:ce69c60bd0597083d96098ce845986ae",
        "X-Auth-Token:1b5025ff8ae372ff86be00ba57532055"
    ));

    // Set the payload for the payment request
    $payload = array(
        'purpose' => 'GO GREEN PRODUCT',
        'amount' => $_SESSION['total-price'],
        'phone' => $row['phone'],
        'buyer_name' => $row['name'],
        'redirect_url' => 'http://65.0.177.203:8080/GG/customer/orders.php',
        'send_email' => true,
        'send_sms' => true,
        'email' => $row['email'],
        'allow_repeated_payments' => false
    );

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));

    // Execute cURL request and capture the response
    $response = curl_exec($ch);

    // Check if cURL request was successful
    if ($response === false) {
        die('cURL error: ' . curl_error($ch));
    }

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $response = json_decode($response);

    // Check if the payment request object is available in the response
    if (isset($response->payment_request) && isset($response->payment_request->id) && isset($response->payment_request->longurl)) {
        // Store payment request ID in session
        $_SESSION['TID'] = $response->payment_request->id;

        // Redirect to the payment URL
        header("Location:" . $response->payment_request->longurl);
        exit();  // Always use exit after header redirection
    } else {
        // Handle error if payment request info is not available in the response
        die('Payment request not created or invalid response received.');
    }
} else {
    die('Customer not found.');
}
?>

