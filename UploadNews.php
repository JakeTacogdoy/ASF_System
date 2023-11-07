<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('db_connection.php');

    // Validate and sanitize input data
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);

    // You can add additional validation here as needed

    // Insert data into the database
    $sql = "INSERT INTO news (description, url) VALUES ('$description', '$url')";

    if (mysqli_query($conn, $sql)) {
        // Successful insertion
        echo 'success';
    } else {
        // Database error
        echo 'error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect if not a POST request
    header('Location: News.php');
    exit();
}
?>
