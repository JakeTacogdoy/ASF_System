<?php
	require_once('db_connection.php');
	
	$id = $_GET['id'];
    $titlen = $_GET['title'];
    $url = $_GET['url'];

	$sql = "DELETE from videos where id = ".$id;
	$result = $conn->query($sql);

	if ($result){
		header("location: Video.php");
	}
?>