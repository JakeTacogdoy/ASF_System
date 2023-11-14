<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    // Get the sender's ID based on the username in the session or URL parameter
    session_start();
    $sender_username = isset($_SESSION['username']) ? $_SESSION['username'] : 'admin';

    $sqlSender = "SELECT id FROM users WHERE username = '$sender_username'";
    $resultSender = $conn->query($sqlSender);

    if ($resultSender->num_rows > 0) {
        $rowSender = $resultSender->fetch_assoc();
        $sender_id = $rowSender['id'];

        // Insert message into the database with timestamp
        $sql = "INSERT INTO messages (user_id, receiver_id, message, timestamp) 
                VALUES ($sender_id, $receiver_id, '$message', NOW())";
        $conn->query($sql);
    } else {
        echo "<p>Error: Sender ID not found.</p>";
    }
}

$conn->close();
?>
