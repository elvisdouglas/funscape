<?php
$conn = require __DIR__ . "/conn.php";

$id = $_GET['id'];
$status = $_GET['status_g'];

$sql = "UPDATE gamer set status_g=$status WHERE id=$id";

mysqli_query($conn, $sql);

header('location:gaming_screens.php');

?>