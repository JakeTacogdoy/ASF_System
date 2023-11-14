<?php
include('db_connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $report_id = $_GET['id'];

    // Delete the report based on the provided report ID
    $sql = "DELETE FROM report WHERE id = $report_id";

    if (mysqli_query($conn, $sql)) {
        // Report successfully deleted
        header("Location: admin_reportlist.php"); // Redirect back to the admin reports page after deletion
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if ($conn) {
    mysqli_close($conn);
}
?>
