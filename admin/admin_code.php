<?php
session_start();
include("config/dbcon.php");
if(isset($_POST['addUser']))
{
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $psw= $_POST['psw'];
    $repeat_psw= $_POST['repeatpsw'];
    // echo $repeat_psw;

    if($psw == $repeat_psw)
    {
        $query = "INSERT INTO customer (name,email,phone,password) VALUES ('$name','$email','$phone','$psw')";
        $result = mysqli_query($con,$query);
        if($result)
        {
            $_SESSION['status']="User Added Successfully";
            header("Location: registered.php");
        }
        else
        {
            $_SESSION['status']="Error! User not added successfully. Please try again.";
            header("Location: registered.php");
        }
        // echo "password match";
        
    }
    else
    {
        $_SESSION['status']="Password must be same";
        header("Location: registered.php");
    }
}
if(isset($_POST['updateUser']))
{
    $user_id= $_POST['user_id'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $add=$_POST['add'];
    $psw= $_POST['psw'];
    $repeat_psw= $_POST['repeatpsw'];
    // echo $user_id;
    if($psw == $repeat_psw)
    {
        $query = "UPDATE customer  SET name='$name', email='$email', phone='$phone', address='$add' WHERE id='$user_id' ";
        $query_run=mysqli_query($con,$query);
        if($query_run)
        {
            $_SESSION['status']="User Updated Successfully";
            header("Location: registered.php");
        }
        else
        {
            $_SESSION['status']="Error! User updating failed. Please try again.";
            header("Location: registered.php");
        }
    }
    else
    {
        $_SESSION['status']="Password must be same";
        header("Location: registered.php");
    }
}

if(isset($_POST['DeleteUserbtn']))
{
    $user_id = $_POST['delete_id'];
    // echo $user_id;

    $query = "DELETE FROM customer WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['status']="User Deleted Successfully";
        header("Location: registered.php");
    }
    else
    {
        $_SESSION['status']="Error! User deleting failed. Please try again.";
        header("Location: registered.php");
    }

}


?>