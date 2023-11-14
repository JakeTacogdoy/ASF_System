<?php
include('db_connection.php');

$receiver_id = isset($_GET['receiver_id']) ? $_GET['receiver_id'] : null;

// Retrieve messages from the database
if ($receiver_id !== null) {
    $sql = "SELECT users.username, messages.message, messages.timestamp FROM messages 
            JOIN users ON messages.id = users.id 
            WHERE messages.receiver_id = $receiver_id
            ORDER BY messages.timestamp ASC";

    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>{$row['username']}</strong>: {$row['message']} ({$row['timestamp']})</p>";
        }
    } else {
        echo "<p>Error in SQL query: " . $conn->error . "</p>";
    }
} else {
    echo "<p>Error: receiver_id not provided.</p>";
}

$conn->close();
?>