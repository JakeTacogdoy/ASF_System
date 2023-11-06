<?php
include('db_connection.php');

$sql = "SELECT messages.id, 
               messages.message, 
               messages.timestamp, 
               sender.FirstName AS sender_first_name, 
               sender.LastName AS sender_last_name, 
               receiver.FirstName AS receiver_first_name, 
               receiver.LastName AS receiver_last_name 
        FROM messages
        JOIN users AS sender ON messages.sender = sender.id
        JOIN users AS receiver ON messages.receiver = receiver.id
        ORDER BY messages.timestamp";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<strong>From: " . $row["sender_first_name"]. " " . $row["sender_last_name"] . "</strong><br>";
        echo "<strong>To: " . $row["receiver_first_name"]. " " . $row["receiver_last_name"] . "</strong><br>";
        echo "Message: " . $row["message"]. "<br>";
        echo "Timestamp: " . $row["timestamp"]. "<br>";
        echo "</div>";
    }
} else {
    echo "No messages yet.";
}

$conn->close();
?>
->close();
?>
