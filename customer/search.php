<?php
$host = '3.109.212.28';
$username = 'root';
$password = 'root';
$database = 'php_user';

$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

$query = $_GET['query'];
$sql = "SELECT name, image, price, discount FROM product WHERE name LIKE '%$query%'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $resultsArray = array();
    while ($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }
    echo json_encode($resultsArray);
} else {
    echo json_encode([]);
}

$connection->close();
?>
