<?php
	session_start();
	include "db_connection.php";
	
	$uname = mysqli_real_escape_string($conn, $_POST['username']);
	$pword = mysqli_real_escape_string($conn,$_POST['password']);

	$sql = "SELECT * FROM users WHERE UserName = '$uname' AND Password = '$pword'";
	$result = $conn -> query ($sql);
	$row = mysqli_fetch_array($result);

	
	if ($uname == isset($row['UserName']) and $pword == isset($row['Password'])){
		$_SESSION['hasLogin'] = 1;
		echo "1";
	}
	else{
		echo "Invalid Account";
	}
?>