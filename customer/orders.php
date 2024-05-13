<?php
session_start();
include('config/dbcon.php');

// $query = "SELECT * FROM cart WHERE cust_id='{$_SESSION['cust-id']}'";
// $res = mysqli_query($con,$query);
// if(mysqli_num_rows($res) > 0)
// {
//     while ($row = mysqli_fetch_assoc($res))
//     {
//         //echo "<h1>" . $row['prod_name'] . "</h1>";
//         $name=array($row['prod_name']);
//         echo $name[0];
        
//     }
// }
$productNames = array(); // Initialize an empty array to store product names
$productIDs = array(); // Initialize an empty array to store product IDs

$query = "SELECT * FROM cart WHERE cust_id='{$_SESSION['cust-id']}'";
$res = mysqli_query($con, $query);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $productNames[] = $row['prod_name']; // Append each product name to the array
        
    }

    // Create a comma-separated list of product names for the SQL query
    $productNameList = "'" . implode("','", $productNames) . "'";
    // echo $productNameList;

    // Construct and execute the SQL query to retrieve product IDs
    // $query = "SELECT id FROM product WHERE name IN ($productNameList)";
    // $res = mysqli_query($con, $query);

    // // Check if there are results
    // if (mysqli_num_rows($res) > 0) {
    //     while ($row = mysqli_fetch_assoc($res)) {
    //         // Append product IDs to the $productIDs array
    //         $productIDs[] = $row['id'];
            

    //     }
    // }
}

$add = "SELECT address FROM customer WHERE id='{$_SESSION['cust-id']}'";
$res = mysqli_query($con, $add);
if($res)
{
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) 
        {
            $getadd = $row['address']; 
            // echo $getadd;
            
        }
    }
    // $cid=$_SESSION['cust-id'];
    // echo $cid;

    // if($getadd == "")
    // {
    //     $_SESSION['madd']="Please fill the address";
    //     // echo "<script>alert('Please fill in the address');</script>";
    //     header("Location: user_profile.php?cust_id=" .$cid);
    // }
    // else
    // {
        
    //     $id=$_SESSION['cust-id'];
    //     $tot=$_SESSION['total-price'];
    //     $status="pending";
    //     foreach ($productNames as $productName) {
    //         $query1 = "INSERT INTO orders (cust_id, prod_name, tot_amt, status) VALUES ('$id', '$productName', '$tot', '$status')";
    //         $res1 = mysqli_query($con, $query1);

    //         if (!$res1) {
    //             // Handle the error here
    //             echo "Error: " . mysqli_error($con);
    //             // You may want to consider rolling back the transaction or other error handling
    //         }
    //     }

    //     header("Location: index.php");
    // }

    
}

$id=$_SESSION['cust-id'];
$tot=$_SESSION['total-price'];
$status="pending";
foreach ($productNames as $productName) {
    $query1 = "INSERT INTO orders (cust_id, prod_name, tot_amt, status) VALUES ('$id', '$productName', '$tot', '$status')";
    $res1 = mysqli_query($con, $query1);

    if (!$res1) {
        // Handle the error here
        echo "Error: " . mysqli_error($con);
        // You may want to consider rolling back the transaction or other error handling
    }
}

header("Location: index.php");


?> 