<?php
include('config/dbcon.php');
session_start();
if(isset($_POST['add_btn']))
{
    $query = "SELECT * FROM product";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $productExists = false; // Flag to check if the product already exists
        
        // Fetch all existing products
        $existingProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Loop through existing products to check if the product already exists
        foreach ($existingProducts as $existingProduct) {
            if ($_POST['prod_name'] === $existingProduct['name']) {
                $productExists = true;
                break; // Product already exists, no need to continue checking
            }
        }

        if (!$productExists) {
            // Product does not exist, so add it to the database
            $new_name = $_POST['prod_name'];
            $new_image = $_POST['prod_img'];
            $new_type = $_POST['prod_type'];
            $new_price = $_POST['prod_price'];
            $new_discount = $_POST['prod_dis'];
            if ($new_name == '' || $new_image == '' || $new_type == '' || $new_price == '' || $new_discount == '') 
            {
                $_SESSION['product'] = "All fields should be filled";
            }
            else{
                $query = "INSERT INTO product (name, image, type, price, discount) VALUES ('$new_name', '$new_image', '$new_type', '$new_price', '$new_discount')";
                $res = mysqli_query($con, $query);
                
                if ($res) {
                    $_SESSION['product'] = "Product Added Successfully";
                } else {
                    $_SESSION['product'] = "Adding of Product failed";
                }
            }
        } else {
            $_SESSION['product'] = "Product already exists";
        }
        
        header("Location: add_product.php");
    }
}
?>