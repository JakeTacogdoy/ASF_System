<?php
include('db_connection.php');

// SQL query to delete all warning messages
$deleteQuery = "DELETE FROM warnings";
$result = $conn->query($deleteQuery);

if ($result) {
    // Deletion was successful
    echo "All warning messages have been deleted successfully.";
} else {
    // Error occurred during deletion
    echo "Error deleting warning messages: " . $conn->error;
}
?>

