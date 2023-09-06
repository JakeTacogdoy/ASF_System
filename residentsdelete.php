<?php
	require_once('db_connection.php');
	
	$id = $_GET['id'];

	$sql = "DELETE from residents where id = ".$id;
	$result = $conn->query($sql);

	if ($result){
		header("location: residents.php");
	}
?>