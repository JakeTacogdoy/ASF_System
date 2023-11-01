<?php
// send_message.php
require('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = intval($_POST['sender_id']);
    $receiver_id = intval($_POST['receiver_id']);
    $message = strip_tags($_POST['message']);

    $query = "INSERT INTO messages (sender_id, receiver_id, body) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('iis', $sender_id, $receiver_id, $message);
        
        if ($stmt->execute()) {
            echo 'Message sent successfully.';
        } else {
            echo 'Error sending the message.';
        }
    } else {
        echo 'Error in query preparation.';
    }
} else {
    echo 'Invalid request.';
}
?>
