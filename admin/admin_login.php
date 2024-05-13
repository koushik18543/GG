<?php
include('config/dbcon.php');
?>
<html>
<head>
<title>Admin Login</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="heading">
        <div class="login-form">
            <h2>ADMIN LOGIN</h2>
            <form method="post">
                <div class="input-field">
                    <i class="bi bi-person-circle"></i>
                    <input type="text" placeholder="Username" name="AdminName">
                </div>
                <div class="input-field">
                    <i class="bi bi-shield-lock"></i>
                    <input type="password" placeholder="Password" name="AdminPassword">
                </div>
        
                <button type="submit" name="adminLogin">Sign In</button>
            </form>
        </div>
    </div>

<?php


if(isset($_POST['adminLogin']))
{
    $adminName=$_POST['AdminName'];
    $adminpassword=$_POST['AdminPassword'];

    if($adminName=='admin' && $adminpassword=='admin')
    {
        // echo "<script>alert('Admin Verified')</script>";
        session_start();
        $_SESSION['AdminLoginId']=$_POST['AdminName'];
        header("Location: index.php");
    }
    else
    {
        echo "<script>alert('Admin Not Verified')</script>";
    }
// $query = "SELECT * FROM admin WHERE name='$_POST[AdminName]' AND password='$_POST[AdminPassword];'";
// $res = mysqli_query($con, $query);

// if ($res) {
//     if (mysqli_num_rows($res) == 1) {
//         echo "<script>alert('Admin Verified')</script>";
//     } else {
//         echo "<script>alert('Admin Not Verified')</script>";
//     }
// } else {
//     echo "Query execution failed: " . mysqli_error($con);
// }

    // if(mysqli_num_rows($result)==1)
    // {
    //     echo "<script>alert('Admin Verified')</script>";
    // }
    // else
    // {
    //     echo "<script>alert('Admin Not Verified')</script>";
    // }
}
?>

</body>
</html>