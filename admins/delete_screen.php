
<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['screen_delete'])){
    $screen_id = $_POST['screen_delete'];

    $query = "DELETE FROM screen WHERE id='$screen_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("Screen deleted successfully"); 
        header("refresh:2;url=manage_screen.php");
        exit;
    }
    else{
        echo("screen not deleted"); 
        header("refresh:2;url=manage_screen.php");
        exit;
    }
}




?>