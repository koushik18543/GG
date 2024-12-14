<?php
ob_start();
session_start();
include('config/dbcon.php'); 
if(isset($_POST['cart-btn']))
{
    if(!is_numeric($tot_price))
    {
        header("Location: index.php");
        $_SESSION['cart']="Quantity should not be null";
    }
    $user_id = $_GET["cust_id"];
    $prod_id=$_POST['prod_id'];
    $prod_name=$_POST['prod_name'];
    $prod_img=$_POST['prod_img'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $tot_price=$qty * $price;
    
    // echo $user_id."<br>".$prod_id."<br>".$prod_name."<br>".$prod_img."<br>";
    // echo $qty,"<br>";
    // echo $price."<br>";
    // // echo $id."<br>";
    // echo "total price".$qty * $price;

    // Check if the product is already in the user's cart.
    $query = "SELECT * FROM cart WHERE cust_id = $user_id AND prod_id = $prod_id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0)
    {
    // Update the quantity in the cart.
    $updateQuery = "UPDATE cart SET qty = qty + $qty, total_price = total_price + $tot_price WHERE cust_id = $user_id AND prod_id = $prod_id";
    mysqli_query($con, $updateQuery);
    header("Location: index.php");
    $_SESSION['cart']="Product Quantity Updated successfully😉";
    }
    else
    {
    // Insert the product into the cart.
    $insertQuery = "INSERT INTO cart (cust_id,prod_id,prod_name,prod_img,qty,price,total_price) VALUES ('$user_id','$prod_id','$prod_name','$prod_img','$qty','$price','$tot_price')";
    mysqli_query($con, $insertQuery);
    header("Location: index.php");
    $_SESSION['cart']="Product Added to the Cart successfully😉";
    }
}
//deleting the all prod from the cart
if(isset($_POST['del-cart']))
{
    $user_id = $_GET["cust_id"];
    // echo $user_id;
    $query="DELETE FROM `cart` WHERE cust_id=$user_id";
    $run=mysqli_query($con,$query);
    if($run)
    {
        header("Location:cart.php?cust_id=".$user_id);
    }
}

// removing single item from the cart
if(isset($_POST['remove-item']))
{
    $user_id = $_GET["cust_id"];
    $prod_id=$_POST['item_id'];
    // echo $user_id;
    $query="DELETE FROM cart WHERE cust_id = $user_id AND prod_id = $prod_id";
    $run=mysqli_query($con,$query);
    if($run)
    {
        header("Location:cart.php?cust_id=".$user_id);
    }
}
// updating the quantity from inside the cart
// if(isset($_POST['update']))
// {
//     $user_id = $_GET["cust_id"];
//     $qty=$_POST['add_qty'];
//     $prod_id=$_POST['item_id'];
//     // $price=$_POST['price'];
//     // $tot_price=$qty * $price;
//     // echo $price."<br>".$tot_price;
//     // $price=$_POST['item_price'];
    
// }
if(isset($_POST['buy-now']))
{
    if (isset($_POST['price'])) {
        $_SESSION['price'] = $_POST['price'];
        
        header("Location:mojo1.php");
        // Now you can use the $price variable in your cart_action.php file as needed.
        // echo "Received price: $" . $_SESSION['price']; // For demonstration purposes
    }
}


?>
