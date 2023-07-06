<?php 
session_start();

?>
<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $op = $_POST['password'];
    $n_p = $_POST['n_p'];
    $c_p = $_POST['c_p'];

    if($n_p !== $c_p){
        echo "the new passwords do not match";
        header("refresh:2;url=forgot_password.php");
    }
    
    $sql = "SELECT password_hash FROM register WHERE password_hash = '$op'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1){
        $sql2 = "UPDATE register SET password_harsh = '$n_p' WHERE id = '$user_id'";
        $result2 = mysqli_query($conn, $sql2);
        echo "Password changed successfully";
        header("refresh:2;url=forgot_password.php");
        exit();
    }else{
        echo "incorrect password";
        header("refresh:2;url=forgot_password.php");
        exit();
    }

}




//$num = mysqli_fetch_array($sql);

//if($num > 0){
    //$con = mysqli_query($conn, "UPDATE register set password_hash = '$n_p' WHERE email = '$email'");
    //echo ("password updated");
    //header("refresh:2;url=forgot_password.php");
    //}else{
    //echo ("password not updated");
    //    header("refresh:2;url=admins.php");
//}


?>

