<?php
include('../db_connection.php');

$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$contact = $_POST['contactNo'];
$pigs = $_POST['pigsNo'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$positive = $_POST['positive'];

// Use a prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO owners (firstname, middlename, lastname, contact, pig, latitude, longitude, is_positive) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("ssssssss", $firstName, $middleName, $lastName, $contact, $pigs, $latitude, $longitude, $positive);

if ($stmt->execute()) {
    header("location: ../brgyadmin/listuser.php");
} else {
    // Handle the error appropriately, such as displaying an error message or logging it.
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>