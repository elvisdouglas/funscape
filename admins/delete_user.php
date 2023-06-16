
<?php 

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['user_delete'])){
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM user WHERE id='$user_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("User deleted successfully"); 
        header("refresh:2;url=users.php");
        exit;
    }
    else{
        echo("User not deleted"); 
        header("refresh:2;url=users.php");
        exit;
    }
}




?>