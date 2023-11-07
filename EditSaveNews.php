<?php
include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $url = $_POST['url'];

    // Use a prepared statement to update the record
    $sql = "UPDATE news SET description = ?, url = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssi", $description, $url, $id);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close(); // Close the prepared statement
        header("Location: News.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    // Redirect to the appropriate page if the form was not submitted via POST
    header("Location: News.php");
    exit();
}
?>
