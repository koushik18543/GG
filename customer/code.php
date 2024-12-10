<?php
session_start(); 
$conn = mysqli_connect("db","root","root","php_user");
if(isset($_POST['register']))
{
    $fisrtname=$_POST['first_name'];
    $email=$_POST['email'];
    $num=$_POST['number'];
    $password=$_POST['psw'];
    $confirm_password=$_POST['confirmpassword'];
    // echo $fisrtname,$email,$password,"confirm",$confirm_password;
    if($password == $confirm_password)
    {
        $query = "INSERT INTO customer (name,email,phone,password) VALUES ('$fisrtname','$email','$num','$password')";
        $query_run = mysqli_query($conn,$query);

        if($query_run)
        {
            $_SESSION['status'] = "Registered Successfully😎";
            header("Location: login.php");
        }
        else
        {
            $_SESSION['status'] = "Failed to Registered!😖";
            header("Location: login.php");
        }

    }
    else
    {
        $_SESSION['status'] = "password mismatched😖";
        header("Location: login.php");
    }
}

if(isset($_POST['login_btn']))
{
    // $emil=$_POST['email'];
    // $psw=$_POST['password'];
    // echo $emil,$psw;
    $query = "SELECT * FROM customer WHERE `email`='{$_POST['email']}' AND `password`='{$_POST['password']}'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        // echo "correct";
        //session_start();
        $_SESSION['email']=$_POST['email'];
        // $name = "SELECT name FROM customer WHERE `email`='{$_POST['email']}'";
        // $run = mysqli_query($conn,$name);
        // if($run)
        // {
        //     $row = mysqli_fetch_assoc($run);
        //     if($row)
        //     { 
        //         $_SESSION['name']=$row['name'];
        //     }
        // }
        header("Location:index.php");
    }
    else
    {
        $_SESSION['status'] = "Login Failed!😖";
        header("Location: login.php");
    }
    
}
?>
