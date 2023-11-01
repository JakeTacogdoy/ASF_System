<?php
// Include your database connection code
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senderId = $_POST['sender_id'];
    $receiverId = $_POST['receiver_id'];
    $message = $_POST['message'];

    // Validate and sanitize the message (implement your own validation logic here)

    // Insert the reply message into the database
    $sql = "INSERT INTO messages (sender_id, receiver_id, message_body) VALUES ($senderId, $receiverId, '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Reply message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>








