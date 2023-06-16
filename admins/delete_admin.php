
<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['admin_delete'])){
    $user_id = $_POST['admin_delete'];

    $query = "DELETE FROM register WHERE id='$user_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("Admin deleted successfully"); 
        header("refresh:2;url=admins.php");
        exit;
    }
    else{
        echo("Admin not deleted"); 
        header("refresh:2;url=admins.php");
        exit;
    }
}




?>