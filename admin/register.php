<?php

//include('conn.php');
//require_once('mysqli.php');



if (empty($_POST["name"])) {
    echo("Name is required");
    header("refresh:3;url=signup.php");
    exit();
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo("Valid email is required");
    header("refresh:3;url=signup.php");
    exit();
}

if (strlen($_POST["password"]) < 8) {
    echo("Password must be at least 8 characters");
    header("refresh:3;url=signup.php");
    exit();
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    echo("Password must contain at least one letter");
    header("refresh:3;url=signup.php");
    exit();
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    echo("Password must contain at least one number");
    header("refresh:3;url=signup.php");
    exit();
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    echo("Passwords don't match");
    header("refresh:3;url=signup.php");
    exit();
}


//retrieving data from form
$username = $_POST["name"];
$email = $_POST["email"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require __DIR__ . "/conn.php";


$sql = "INSERT INTO user (names, email, password_hash)
        VALUES ('$username', '$email', '$password_hash')";


if ($conn->query($sql) === TRUE) {
    //redirect to admin dashboard
    echo "User registered successfully";
    header("refresh:3;url=home.php");
    exit();
} else {
    if ($mysqli->errno === 1062) {
        echo("email already taken");
        header("refresh:3;url=signup.php");
        exit();
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