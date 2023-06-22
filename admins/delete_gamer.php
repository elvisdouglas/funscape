
<?php 

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['gamer_delete'])){
    $gamer_id = $_POST['gamer_delete'];

    $query = "DELETE FROM gamer WHERE id='$gamer_id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("Gaming time deleted successfully"); 
        header("refresh:2;url=gaming_screens.php");
        exit;
    }
    else{
        echo("Gaming time not deleted"); 
        header("refresh:2;url=gaming_screens.php");
        exit;
    }
}




?>