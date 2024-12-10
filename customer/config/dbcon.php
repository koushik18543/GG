<?php
$host='3.109.212.28';
$username='root';
$password='root';
$database='php_user';
//connection
$con = mysqli_connect("$host","$username","$password","$database");
//check connection
if(!$con){
    header("Location: ../errors/dberror.php");
    die();
    // die(mysqli_connect_errno($con));
}
// else
// {
//     echo "db connected";
// }
?>
