<?php
Include('db_connection.php');
$id = $_POST['id'];
$description = $_POST['description'];
$url = $_POST['url'];

// Use proper SQL syntax for UPDATE
$sql = "UPDATE news SET description = '".$description."', url = '".$url."' WHERE id = ".$id;
$res = $conn->query($sql);

if ($res){
    header("Location: News.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error; // You can add error handling
}
?>
