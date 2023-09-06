		<?php
		include('db_connection.php');
		$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		$UserName = $_POST['UserName'];
		$Password = $_POST['Password'];

		$sql = "insert into users (FirstName, LastName, UserName, Password) values ('".$FirstName."', '".$LastName."', '".$UserName."', '".$Password."')";
		
		$res = $conn->query($sql);
	
		if ($res){
			header("location: login.php");
		}
	
	?>