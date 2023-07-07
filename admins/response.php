<?php
session_start();


$from_time1=date('H:i:s');
//$to_time1=$_SESSION["duration"];
$_SESSION["end_time"] = strtotime('+ 5 minute');

if (isset($_SESSION["end_time"])) {
    $to_time1 = $_SESSION["end_time"];  

    //$end_t = $from_time1 + $to_time1;

    //$Cut = strtotime($end_t);
    $time_first = strtotime($from_time1);
    $time_second = $to_time1;

    $dfs = strtotime("$time_second - $time_first");
    //$difference_in_seconds = $time_first - $time_second;

    echo gmdate('H:i:s', $dfs);
    //echo gmdate("H:i:s", $difference_in_seconds);
} else {
    echo "The 'end_time' session variable is not set.";
}


//$adding= strtotime("17:26:11 + $duration minute");
  //echo date('H:i:s', $adding);
// Set the timezone
//date_default_timezone_set('UTC');

// Set the starting time
//$startTime = time();
//$endTime = $startTime + (30 * 60); // 30 minutes = 30 * 60 seconds

// Loop until the countdown reaches 0
//while (time() < $endTime) {
//    $remainingSeconds = $endTime - time();
//    $minutes = floor($remainingSeconds / 60);
//    $seconds = $remainingSeconds % 60;

    // Output the countdown
//    echo sprintf("Time remaining: %02d:%02d\n", $minutes, $seconds);

    // Wait for 1 second before updating the countdown
//    sleep(1);
//}

//echo "Countdown finished!";



// Assuming you have set the "end_time" session variable somewhere in your code
//






?>