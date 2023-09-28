<?php
    Include('db_connection.php');

    $fname = mysqli_real_escape_string($conn,$_POST["firstName"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lastName"]);
    $email = mysqli_real_escape_string($conn,$_POST["Email"]);
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $userType = mysqli_real_escape_string($conn,$_POST["userType"]);
    $id = mysqli_real_escape_string($conn,$_POST["hiddenID"]); // Get the user ID from the form

    $sql = "UPDATE users SET LastName = '".$lname."', FirstName = '".$fname."',Email = '".$email."', UserName = '".$username."', Password = '".$password."', userType = '".$userType."' WHERE id = ".$id;
    $res = $conn->query($sql);

    if ($res){
        header("location: Account.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>