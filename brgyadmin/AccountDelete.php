<?php
	require_once('db_connection.php');
	
	$id = $_GET['id'];

	$sql = "DELETE from users where id = ".$id;
	$result = $conn->query($sql);

	if ($result){
		header("location: Account_user.php");
	}
?>