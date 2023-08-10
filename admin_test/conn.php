<?php
//mysql_connect("localhost","root","");
//mysql_select_db("funscape");
/*
$db = 'mysql:host=localhost;dbname=funscape';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($db, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

*/


$host = "localhost";
$dbname = "funscape";
$surname = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $surname,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
//echo 'connected';
