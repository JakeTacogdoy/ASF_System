<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hiddenID = $_POST['hiddenID']; // Use hiddenID, not id
    $description = $_POST['description'];
    $url = $_POST['url'];

    // Update the news record
    $sql = "UPDATE news SET description = '$description', url = '$url' WHERE id = $hiddenID";

    if ($conn->query($sql) === TRUE) {
        header("Location: News.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    header("Location: EditNews.php");
    exit();
}
?>

