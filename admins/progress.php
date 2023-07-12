<?php
include 'conn.php';

$conn = require __DIR__ . "/conn.php";
// $timer = "SELECT * FROM gamer";
// $c_timer = mysqli_query($conn,$timer);
// while($row1=mysqli_fetch_assoc($c_timer)){
//   $duration = $row1["duration"]; 
// //   $date = $row1["date"];
// //   $_SESSION["end-time"] = $row1["duration"];
// //   $_SESSION["date_t"] = $row1["date"];
//   //echo $_SESSION["end-time"];
//   //echo $duration;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timer progress Indicator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="fun">
        <p>Funscape Active screens</p><br>        
    </div>
    <div style="text-decoration: none;  font-weight: bold">
        <button class="btn" type="button"><a style="text-decoration: none; color: white;" href="index.php">Dashboard</a></button>
    </div>
    <div class="main-container center">
        <!-- progress indicator -->
        <div class="circle-container center">
            <div class="semicircle"></div>
            <div class="semicircle"></div>
            <div class="semicircle"></div>
            <div class="outermost-circle"></div>
        </div>
        

        <!-- screen name -->
        <!-- <div class="screen center"><p>screen 01</p></div> -->
        <!-- timer -->
        <div class="timer-container center">            
            <div class="timer center"></div>
        </div>

    </div>
    




    <script src="script.js"></script>
</body>
</html>