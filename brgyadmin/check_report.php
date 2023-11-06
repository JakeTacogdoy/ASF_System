<?php
include('../db_connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $report_id = $_GET['id'];

    // Fetch the checked report from the 'reports' table based on the provided ID
    $sql_select = "SELECT * FROM report WHERE id = $report_id";
    $result = mysqli_query($conn, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Move the checked report to the 'accepted_reports' table
        $reporter_name = $row['reporter_name'];
        $report_content = $row['report_content'];

        $sql_move = "INSERT INTO accepted_reports (reporter_name, report_content) VALUES ('$reporter_name', '$report_content')";

        if (mysqli_query($conn, $sql_move)) {
            // Delete the report from the 'reports' table after moving it
            $sql_delete = "DELETE FROM report WHERE id = $report_id";
            if (mysqli_query($conn, $sql_delete)) {
                // Successfully moved and deleted the report
                header("Location: admin_reportlist.php");
                exit();
            } else {
                echo "Error deleting the report: " . mysqli_error($conn);
            }
        } else {
            echo "Error moving the report: " . mysqli_error($conn);
        }
    } else {
        echo "No report found with the provided ID";
    }
}

if ($conn) {
    mysqli_close($conn);
}
?>
