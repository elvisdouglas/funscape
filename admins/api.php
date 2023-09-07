<?php
$conn = require __DIR__ . "/conn.php";
ini_set('max_execution_time', 300);
// Get the HTTP method and route
$method = $_SERVER['REQUEST_METHOD'];
$route = $_SERVER['REQUEST_URI'];

// API logic based on method and route
if ($method === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    $final_data = (int)$data['data'];

    $updateQuery = "UPDATE gamer SET status = 'paused' WHERE id = '$final_data'";
    $updateResult = mysqli_query($conn, $updateQuery);

    $response = array('message' => 'POST request for /api/data', 'data' => json_encode($final_data));
} elseif ($method === 'POST') {

    // Handle POST request for /api/data
    $data = json_decode(file_get_contents('php://input'), true);
    $final_data = (int)$data['data'];

    // getting remaining time
    $query = "SELECT duration FROM gamer WHERE id= $final_data ";
    $run = mysqli_query($conn, $query);

    $data = array();
    while ($row12 = mysqli_fetch_assoc($run)) {

        // Fetch data from the result set
        $data[] = $row12;
    }

    $value = $data[0]["duration"];

    echo $value;

    // duration values stored in timeRemaining
    $timeRemaining = $value;

    $updateQuery = "UPDATE gamer SET status = '' WHERE id = '$final_data'";
    $updateResult = mysqli_query($conn, $updateQuery);
    

    //Start the timer countdown
    while ($timeRemaining > 0) {

        $pauseQuery = "SELECT status FROM gamer WHERE id = $final_data ";
        $pauseResult = mysqli_query($conn, $pauseQuery);

        $row = mysqli_fetch_assoc($pauseResult);
        $status = $row['status'];

        if ($status === "paused") {
            break;
        }
        
        sleep(60); // Wait for 1 second
        $timeRemaining--;
        //     // Update the database with the new time remaining
        
            $updateQuery = "UPDATE gamer SET duration = $timeRemaining WHERE id = $final_data ";
            $updateResult = mysqli_query($conn, $updateQuery);

            if (!$updateResult) {
                die("Update query failed: " . mysqli_error($conn));
            }        
    }


    // Process $data and generate a response
    // $raw_data = json_encode($data);
    $response = array('message' => 'POST request for /api/data', 'data' => json_encode($final_data));
} else {
    // Handle other HTTP methods
    $response = array('message' => 'Unsupported HTTP method');
}

// Set the response content type to JSON
header('Content-Type: application/json');

// Return the response as JSON
echo json_encode($response);
