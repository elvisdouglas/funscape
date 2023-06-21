<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['update_screen'])){
    $screen_id = $_POST['screen_id'];
    $screen = $_POST['name'];

    $query = "UPDATE screen SET screen='$screen'
                WHERE id='$screen_id' ";

        $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo("Screen Updated successfully"); 
        header("refresh:2;url=manage_screen.php");
        exit(0);
    }
}



?>