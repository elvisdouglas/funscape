<?php 
session_start();

?>
<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $n_p = $_POST['n_p'];
    $c_p = $_POST['c_p'];

    echo $password;
    $sql = mysqli_query($conn, "SELECT email, password_hash FROM register WHERE email = '$email' AND password_hash = '$password'");

    $num = mysqli_fetch_array($sql);

    if($num > 0){
        $con = mysqli_query($conn, "UPDATE register set password_hash = '$n_p' WHERE email = '$email'");
        echo ("password updated");
        header("refresh:2;url=forgot_password.php");
    }else{
        echo ("password not updated");
        header("refresh:2;url=admins.php");
    }
}


?>
