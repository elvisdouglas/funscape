<?php
session_start();

//$from_time1=date('Y-m-d H:i:s');
//$to_time1=$_SESSION["duration"];
//$_SESSION["end_time"] = "duration";
if (isset($_SESSION["end_time"])) {
    $from_time1 = date('Y-m-d H:i:s');
    $to_time1 = $_SESSION["end_time"]; 

    $time_first = strtotime($from_time1);
    $time_second = strtotime($to_time1);

    $difference_in_seconds = $time_second - $time_first;

    echo gmdate("H:i:s", $difference_in_seconds);
} else {
    echo "The 'end_time' session variable is not set.";
}


// Assuming you have set the "end_time" session variable somewhere in your code
//






?>