<?php
	session_start();
	include "db_connection.php";
	
	$uname = mysqli_real_escape_string($conn, $_POST['username']);
	$pword = mysqli_real_escape_string($conn,$_POST['password']);

	$sql = "SELECT * FROM users WHERE UserName = '$uname' AND Password = '$pword'";
	$result = $conn -> query ($sql);
	$row = mysqli_fetch_array($result);

	
	
	if ($uname == isset($row['UserName']) and $pword == isset($row['Password']) and $row['usertype'] == "admin"){
		$_SESSION['hasLogin'] = 1;
		$_SESSION['username'] = $row['UserName'];
		echo "1";
	}
	else if($uname == isset($row['UserName']) and $pword == isset($row['Password']) and $row['usertype'] == "user"){
		$_SESSION['hasLogin'] = 1;
		echo "2";
	}
	else if($uname == isset($row['UserName']) and $pword == isset($row['Password']) and $row['usertype'] == "da-admin"){
		$_SESSION['hasLogin'] = 1;
		echo "3";
	}
	else{
		echo "Invalid Account";
	}
?>