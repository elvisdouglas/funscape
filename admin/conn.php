<?php
//mysql_connect("localhost","root","");
//mysql_select_db("funscape");

$db = 'mysql:host=localhost;dbname=funscape';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($db, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
