<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]); // Don't hash the password
    $userType = mysqli_real_escape_string($conn, $_POST["userType"]);

    $sql = "INSERT INTO users (email, FirstName, LastName, username, password, usertype) VALUES ('$email', '$fname', '$lname', '$username', '$password', '$userType')";

    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}

$conn->close();
?>
