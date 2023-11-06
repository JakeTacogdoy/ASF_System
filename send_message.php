<?php
include('db_connection.php');

$message = $_POST['message'];
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];

$sql = "INSERT INTO messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$message')";
$conn->query($sql);

$conn->close();
?>

