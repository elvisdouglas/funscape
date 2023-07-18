<?php
session_start();

$conn = require __DIR__ . "/conn.php";

if (isset($_POST['submit'])) {
    $user_id = $_POST['id'];
    $op = $_POST['password'];
    $n_p = password_hash($_POST['n_p'], PASSWORD_DEFAULT);


    // Check if the provided current password matches the one stored in the database
    $sql = "SELECT password_hash FROM register WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Query execution failed: ' . mysqli_error($conn));
    }

    // password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (mysqli_num_rows($result) === 1) {
        // Update the password in the database
        $sql2 = "UPDATE register SET password_hash = '$n_p' WHERE id='$user_id'";
        $result2 = mysqli_query($conn, $sql2);
        if (!$result2) {
            die('Query execution failed: ' . mysqli_error($conn));
        }

        echo "Password changed successfully";
        header("refresh:2;url=forgot_password.php");
        exit();
    } else {
        echo "Incorrect user ID";
        header("refresh:2;url=forgot_password.php");
        exit();
    }
}
?>

