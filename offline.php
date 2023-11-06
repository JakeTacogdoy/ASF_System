<?php
session_start();

if(isset($_SESSION['user_id'])) {
    
    include("db_connection.php");

    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO messages (sender_id, message, status, timestamp) VALUES ('$user_id', '$message', 'online', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Please log in to use the chat.";
}
?>
