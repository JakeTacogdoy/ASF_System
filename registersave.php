		<?php
		include('db_connection.php');
		$FirstName = mysqli_real_escape_string($_POST['FirstName']);
		$LastName = mysqli_real_escape_string($_POST['LastName']);
		$UserName = mysqli_real_escape_string($_POST['UserName']);
		$Password = mysqli_real_escape_string($_POST['Password']);

		$sql = "insert into users (FirstName, LastName, UserName, Password) values ('".$FirstName."', '".$LastName."', '".$UserName."', '".$Password."')";
		
		$res = $conn->query($sql);
	
		if ($res){
			header("location: login.php");
		}
	
	?>