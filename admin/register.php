<?php

//include('conn.php');
//require_once('mysqli.php');



if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords don't match");
}


//retrieving data from form
$username = $_POST["name"];
$email = $_POST["email"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require __DIR__ . "conn.php";


$sql = "INSERT INTO user (name, email, password_hash)
        VALUES ('$username', '$email', '$password_hash')";


if ($conn->query($sql) === TRUE) {
    echo "User registered successfully";
    header("Location: index.php");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    //echo "Error: " . $sql . "<br>" . $con->error;
}

//having and error on line 38
//$stmt = $con->stmt_init();

//if (!$stmt->prepare($sql)) {
//    die("SQL error: " . $con->error);
//}

//$stmt->bind_param(
//    "sss",
//    $_POST["name"],
//    $_POST["email"],
//    $password_hash
//);
/*
if ($stmt->execute()) {

    //refresh time of 2 secs
    header("Location: signup-success.html");
    exit;
} else {

    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
*/