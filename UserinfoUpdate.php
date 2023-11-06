
<?php
    Include('db_connection.php');

    $fname = mysqli_real_escape_string($conn,$_POST["firstName"]);
    $mname = mysqli_real_escape_string($conn,$_POST["middleName"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lastName"]);
    $contact = mysqli_real_escape_string($conn,$_POST["contactNo"]);
    $pigs = mysqli_real_escape_string($conn,$_POST["pigsNo"]);
    $positive = mysqli_real_escape_string($conn,$_POST["positive"]);
     
    $id = mysqli_real_escape_string($conn,$_POST["hiddenID"]); 

    $sql = "UPDATE owners SET firstname = '".$fname."', middlename = '".$mname."', lastname = '".$lname."', contact = '".$contact."', pig = '".$pigs."', is_positive = '".$positive."' WHERE id = ".$id;
    $res = $conn->query($sql);

    if ($res){
        header("location: Userslist.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    ?>
