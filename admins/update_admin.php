<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['update_admin'])){
    $user_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE register SET username='$username', email='$email'
                WHERE id='$user_id' ";

        $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("Admin Updated successfully"); 
        header("refresh:2;url=admins.php");
        exit(0);
    }
}



?>