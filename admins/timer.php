<?php
session_start();

if(isset($_SESSION["end-time"])){
    $to_time1=$_SESSION["end-time"];
//echo $to_time1;
$currentTimestamp = time(); // Current timestamp
$endTime = strtotime("+ $to_time1 minute"); // Calculate the end timestamp

if ($endTime !== false) {
    $remainingTime = $endTime - $currentTimestamp;

    if ($remainingTime > 0) {
        $hours = floor($remainingTime / 3600);
        $minutes = floor(($remainingTime % 3600) / 60);
        $seconds = $remainingTime % 60;

        echo "Time remaining: $hours hours, $minutes minutes, $seconds seconds";
    } else {
        echo "Countdown expired.";
    }
} else {
    echo "Invalid duration format.";
}
}else{
    echo "End time not set!";
}


?>