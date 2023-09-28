<?php
    Include('db_connection.php');

    $fname = mysqli_real_escape_string($conn,$_POST["firstName"]);
    $mname = mysqli_real_escape_string($conn,$_POST["middleName"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lastName"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $contact = mysqli_real_escape_string($conn,$_POST["contactNo"]);
    $barangay = mysqli_real_escape_string($conn,$_POST["barangay"]);
    $farm = mysqli_real_escape_string($conn,$_POST["farmNo"]);
    $pig = mysqli_real_escape_string($conn,$_POST["pigsNo"]);
    $id = mysqli_real_escape_string($conn,$_POST["hiddenID"]); 

    $sql = "UPDATE owners SET  firstname = '".$fname."', middlename = '".$mname."', lastname = '".$lname."', email = '".$email."', barangay = '".$barangay."',contact = '".$contact."', farm = '".$farm."', pig = '".$pig."' WHERE id = ".$id;
    $res = $conn->query($sql);

    if ($res){
        header("location: Userslist.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
?>