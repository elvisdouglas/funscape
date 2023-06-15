<?php

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

if ($_POST["password"] !== $_POST["confirm_password"]) {
    echo("Passwords don't match");
    header("refresh:3;url=register.php");
    exit();
}


//retrieving data from form
$username = $_POST["name"];
$email = $_POST["email"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require __DIR__ . "/conn.php";


$sql = "INSERT INTO register (username, email, password_hash)
        VALUES ('$username', '$email', '$password_hash')";


if ($conn->query($sql) === TRUE) {
    //redirect to admin dashboard
    echo "Admin registered successfully";
    header("refresh:3;url=register.php");
    exit();
} else {
    if ($mysqli->errno === 1062) {
        echo("email already taken");
        header("refresh:3;url=register.php");
        exit();
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    //echo "Error: " . $sql . "<br>" . $con->error;
}



/*
$conn = mysqli_connect("localhost","root","","funscape");

//retrieving data from database
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($password === $password_hash)
    {
        $query = "INSERT INTO register (username,email,password_hash) VALUES ('$username','$email','$password_hash')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header("refresh:3;url=register.php");
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header("refresh:3;url=register.php");
        }
    }
    else 
    {
        
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header("refresh:3;url=register.php");
    }

}

*/

?>