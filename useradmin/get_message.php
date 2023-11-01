<?php
// Include your database connection code here
include('../db_connection.php');


$senderId = 1;
$receiverId = 2;

// SQL query to retrieve messages for a specific conversation
$sql = "SELECT sender_id, receiver_id, message_body, created_at
        FROM messages
        WHERE (sender_id = $senderId AND receiver_id = $receiverId)
        OR (sender_id = $receiverId AND receiver_id = $senderId)
        ORDER BY created_at ASC";

$result = $conn->query($sql);

$messages = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $senderId = $row['sender_id'];
        $receiverId = $row['receiver_id'];
        $messageBody = $row['message_body'];
        $createdAt = $row['created_at'];

        $message = array(
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message_body' => $messageBody,
            'created_at' => $createdAt,
        );

        array_push($messages, $message);
    }
}

// Convert the messages array to JSON and echo it
echo json_encode($messages);

// Close the database connection
$conn->close();
?>



