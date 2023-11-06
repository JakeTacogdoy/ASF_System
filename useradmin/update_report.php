<?php
session_start();
require_once('../db_connection.php');

$hasLogin = (isset($_SESSION['hasLogin']) ? $_SESSION['hasLogin'] : 0);

if (empty($hasLogin)) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $reporter_name = $_POST['reporter_name'];
    $report_content = $_POST['report_content'];

    // Update the report in the database
    $sql = "UPDATE report SET reporter_name = '$reporter_name', report_content = '$report_content' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("location: userreport.php"); // Redirect back to the edit form after successful update
        exit;
    } else {
        echo "Error updating report: " . mysqli_error($conn);
    }
}
?>
