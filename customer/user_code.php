<?php
session_start();
include("config/dbcon.php");
if(isset($_POST['user_btn']))
{
    $user_id=$_POST['cust_id'];
    $query = "SELECT * FROM customer WHERE id = '$user_id'";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    $name = $user_data['name'];
    $email = $user_data['email'];
    $phone_number = $user_data['phone'];
    $address = $user_data['address'];
    $password = $user_data['password'];

    if($_POST['cust_add'] !== $address)
    {
        $new_address = $_POST['cust_add'];
        $query = "UPDATE customer SET address = '$new_address' WHERE id = '$user_id'";
        $res=mysqli_query($con, $query);
        if($res)
        {
            $_SESSION['user']="Customer address upadated successfullyy!!";
            header("Location: user_profile.php?cust_id=" .$user_id);
        }
        else
        {
            $_SESSION['user']="Customer address not upadated successfullyy!!";
            header("Location: user_profile.php?cust_id=" .$user_id);
        }
    }


    $new_pass = $_POST['pass'];
    $new_repass = $_POST['re-pass'];
    
    if($new_pass == $new_repass)
    {
        $new_pass = $_POST['pass'];
        // $new_repass = $_POST['re-pass'];

        $query = "UPDATE customer SET password = '$new_pass'  WHERE id = '$user_id'";
        $res=mysqli_query($con, $query);
        if($res)
        {
            $_SESSION['user']="Customer profile upadated successfullyy!!";
            header("Location: user_profile.php?cust_id=" .$user_id);
        }
    }
    if($new_pass !== $new_repass)
    {
        $_SESSION['user']="Customer,password mismatched !!";
        header("Location: user_profile.php?cust_id=" .$user_id);
    }     



    if($_POST['cust_name'] !== $name || $_POST['cust_email'] !== $email || $_POST['cust_num'] !== $phone_number)
    {
        $new_name = $_POST['cust_name'];
        $new_email = $_POST['cust_email'];
        $new_num = $_POST['cust_num'];
        $new_pass = $_POST['pass'];
        $query = "UPDATE customer SET name = '$new_name', email = '$new_email', phone = '$new_num', password = '$new_pass' WHERE id = '$user_id'";
        $res=mysqli_query($con, $query);
        if($res)
        {
            $_SESSION['user']="Customer profile upadated successfullyy!!";
            header("Location: user_profile.php?cust_id=" .$user_id);
        }
        else
        {
            $_SESSION['user']="Customer profile not upadated successfullyy!!";
            header("Location: user_profile.php?cust_id=" .$user_id);
        }

    }

    // if($_POST['cust_name'] == $name || $_POST['cust_email'] == $email || $_POST['cust_add'] == $address || $_POST['cust_num'] == $phone_number)
    // {
    //     $_SESSION['user1']="No Field Updated!";
    //     header("Location: user_profile.php?cust_id=" .$user_id);
    // }
    
    // else
    // {
    //     $_SESSION['user']="No Field Updated!";
    //     header("Location: user_profile.php?cust_id=" .$user_id);
    // }
}
?>