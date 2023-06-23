<?php

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['gamer'])){
    $screen_id = $_POST['screen_id'];
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $query = "INSERT INTO gamer (screen_id, hour, minute, price, status_g) 
                VALUES ('$screen_id','$hour', '$minute','$price','$status')";
    $query_run = mysqli_query($conn,$query);   
    
    if($query_run){
        echo "Gaming time added!!";
        header("refresh:2;url=gamer.php");
    }else{
        echo "Gaming time not added!!";
        header("refresh:2;url=gamer.php");
    }
    


}










?>