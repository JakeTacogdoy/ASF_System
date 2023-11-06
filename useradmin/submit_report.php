<?php
include('../db_connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reporter_name = $_POST['reporter_name'];
    $report_content = $_POST['report_content'];

    // Inserting into the database
    $sql = "INSERT INTO report (reporter_name, report_content) VALUES ('$reporter_name', '$report_content')";

    if ($conn && mysqli_query($conn, $sql)) {
        // Redirect to the 'userreport' location after successful submission
        header("Location: userreport.php");
        exit(); // Ensure that no other output is sent
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if ($conn) {
    mysqli_close($conn);
}
?>
