		<?php
		include('db_connection.php');
		$id = $_POST['hiddenID'];
		$LastName = $_POST['LastName'];
		$FirstName = $_POST['FirstName'];
		$MiddleName = $_POST['MiddleName'];
		$Birthdate = $_POST['Birthdate'];
		$Sex = $_POST['Sex'];
		$Status = $_POST['Status'];
	
		$sql = "insert into residents (LastName, FirstName, MiddleName, Birthdate, Sex, Status) values ('".$LastName."', '".$FirstName."', '".$MiddleName."', '".$Birthdate."', '".$Sex."', '".$Status."')";
		
		$res = $conn->query($sql);
	
		if ($res){
			header("location: residents.php");
		}
	
	?>