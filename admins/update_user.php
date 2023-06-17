
<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['update_user'])){
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE user SET names='$username', email='$email'
                WHERE id='$user_id' ";

        $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("User Updated successfully"); 
        header("refresh:2;url=users.php");
        exit(0);
    }
}



?>