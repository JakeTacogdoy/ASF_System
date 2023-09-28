<?php
		include('db_connection.php');
        $firstName = $_POST['firstName'];
        $middlename = $_POST['middleName'];
		$lastname = $_POST['lastName'];
        $contact = $_POST['contact'];
		$barangay = $_POST['barangay'];
		$farms = $_POST['farm'];
		$pigs = $_POST['pig'];
	
		$sql = "insert into owners (firstName, middleName, lastName, contact, barangay, farm, pig) values ('".$firstName."', '".$middlename."', '".$lastname."', '".$contact."', '".$barangay."', '".$farm."', '".$pig."')";
		
		$res = $conn->query($sql);
	
		if ($res){
			header("location: Userslist.php");
		}
	
	?>