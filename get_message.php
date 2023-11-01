<?php

require('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender_id = intval($_POST['sender_id']);
    $receiver_id = intval($_POST['receiver_id']);

    $query = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY created_at";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('iiii', $sender_id, $receiver_id, $receiver_id, $sender_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $messages = array();
        while ($row = $result->fetch_assoc()) {
            $timestamp = date('Y-m-d H:i:s', strtotime($row['created_at']));
            $message = htmlspecialchars($row['body']);
            $messages[] = "<div class='message'><strong>$timestamp</strong>: $message</div>";
        }

        echo implode('', $messages);
    } else {
        echo 'Error in query preparation.';
    }
} else {
    echo 'Invalid request.';
}
?>




