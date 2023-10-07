<?php
include('db_connection.php');

$Email = $_POST['email'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$contact = $_POST['contactNo'];
$barangay = $_POST['barangay'];
$purok = $_POST['purok'];
$farms = $_POST['farmNo'];
$pigs = $_POST['pigsNo'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Use a prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO owners (email, firstname, middlename, lastname, contact, barangay, purok, farm, pig, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $Email, $firstName, $middleName, $lastName, $contact, $barangay, $purok, $farms, $pigs, $latitude, $longitude);

if ($stmt->execute()) {
    header("location: Userslist.php");
} else {
    // Handle the error appropriately, such as displaying an error message or logging it.
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>