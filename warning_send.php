<?php 
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the warning message from the form
    $message = $_POST["message"];

    // Get the current timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Query to retrieve all users from the "users" table
    $userQuery = "SELECT * FROM users";
    $userResult = $conn->query($userQuery);

    if ($userResult) {
        while ($user = $userResult->fetch_assoc()) {
            $userId = $user["id"];

            // Insert the warning message for each user into the "warnings" table
            $insertQuery = "INSERT INTO warnings (user_id, message, created_at) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("iss", $userId, $message, $timestamp);

            if ($stmt->execute()) {
                // Warning message sent to the user with ID: $userId
            } else {
                // Error sending the warning message
                echo "Error sending warning message for user with ID: " . $userId;
            }
        }
    } else {
        echo "Error retrieving user data: " . $conn->error;
    }
    
    // Redirect back to the warninginterface.php page
    header("Location: warninginterface.php");
    exit(); // Ensure that no other code is executed after the redirection
}
?>
