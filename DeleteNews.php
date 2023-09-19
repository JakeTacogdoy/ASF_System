<?php
	require_once('db_connection.php');
	
	$id = $_GET['id'];
    $description = $_GET['description'];
    $url = $_GET['url'];

	$sql = "DELETE from news where id = ".$id;
	$result = $conn->query($sql);

	if ($result){
		header("location: News.php");
	}
?>