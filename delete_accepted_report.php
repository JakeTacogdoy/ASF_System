<?php
include('db_connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['report_id'])) {
    $report_id = $_GET['report_id'];

    // Delete the report based on the provided report ID
    $sql = "DELETE FROM accepted_reports WHERE report_id = $report_id";

    if (mysqli_query($conn, $sql)) {
        // Report successfully deleted
        header("Location: accepted_reports.php"); // Redirect back to the admin reports page after deletion
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if ($conn) {
    mysqli_close($conn);
}
?>