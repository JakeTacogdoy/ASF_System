<?php
	Include('db_connection.php');
	$id = $_POST['hiddenID'];
	$LastName = $_POST['LastName'];
	$FirstName = $_POST['FirstName'];
	$MiddleName = $_POST['MiddleName'];
	$Birthdate = $_POST['Birthdate'];
	$Sex = $_POST['Sex'];
	$Status = $_POST['Status'];

	$sql = "UPDATE residents SET LastName = '".$LastName."', FirstName = '".$FirstName."', MiddleName = '".$MiddleName."', Birthdate = '".$Birthdate."', Sex = '".$Sex."', Status = '".$Status."' where id = ".$id;
		$res = $conn->query($sql);

	if ($res){
		header("location: residents.php");
	}
;
	
?>