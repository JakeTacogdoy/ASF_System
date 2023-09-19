<?php
if (isset($_POST['submit'])) {
    include "db_connection.php";

    $id = $_POST['id'];
    $description = $_POST['description'];
    $url = $_POST['url'];

    // You can add validation for the description and URL here

    // Insert the news data into the database
    $sql = "INSERT INTO news (id, description, url) VALUES ('$id', '$description', '$url')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redirect to the homepage
        exit();
    } else {
        $error_message = "Error: " . mysqli_error($conn);
        header("Location: News.php?error=$error_message"); // Redirect to the upload page with an error message
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
