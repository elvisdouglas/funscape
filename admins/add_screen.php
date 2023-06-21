<?php

include 'conn.php';

if (empty($_POST["name"])) {
    echo("Screen name is required");
    header("refresh:3;url=screen.php");
    exit();
}
//retrieving data from form
$screen_name = $_POST["name"];

$conn = require __DIR__ . "/conn.php";


$sql = "INSERT INTO screen (screen)
        VALUES ('$screen_name')";


if ($conn->query($sql) === TRUE) {
    //redirect to admin dashboard
    echo "Screen registered successfully";
    header("refresh:3;url=manage_screen.php");
    exit();
} else {
    if ($mysqli->errno === 1062) {
        echo("screen not added");
        header("refresh:3;url=screen.php");
        exit();
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    //echo "Error: " . $sql . "<br>" . $con->error;
}



?>