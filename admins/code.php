<?php

//include('conn.php');
//require_once('mysqli.php');



if (empty($_POST["name"])) {
    echo("Name is required");
    header("refresh:3;url=register.php");
    exit();
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo("Valid email is required");
    header("refresh:3;url=register.php");
    exit();
}

if (strlen($_POST["password"]) < 8) {
    echo("Password must be at least 8 characters");
    header("refresh:3;url=register.php");
    exit();
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    echo("Password must contain at least one letter");
    header("refresh:3;url=register.php");
    exit();
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    echo("Password must contain at least one number");
    header("refresh:3;url=register.php");
    exit();
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    echo("Passwords don't match");
    header("refresh:3;url=register.php");
    exit();
}


//retrieving data from form
$username = $_POST["name"];
$email = $_POST["email"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require __DIR__ . "/conn.php";

//checking if email is available

//avoiding overwrite of usernames
$result = mysqli_query($conn, "SELECT * FROM register WHERE email='$email'");

$number_of_rows = mysqli_num_rows($result);

if($number_of_rows != 0){
    echo "Email already exists";
    header("refresh:2;url=register.php");
}else{
    
    $sql = "INSERT INTO register (username, email, password_hash)
        VALUES ('$username', '$email', '$password_hash')";

$assign = mysqli_query($conn, $sql);
if ($assign == true) {
    //redirect to admin dashboard
    echo "Admin registered successfully";
    header("refresh:3;url=index.php");
    exit();
} else {
        echo("email already taken");
        header("refresh:3;url=register.php");
        exit();
    //echo "Error: " . $sql . "<br>" . $con->error;
}
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