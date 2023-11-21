<?php
    include "db_connection.php";

    $senderId = $_POST['sender_id'];
    $customer_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    $query = mysqli_query($conn, "INSERT INTO messages(from_id, to_id, message) VALUES ($senderId,$customer_id, '$message')");
    if($query){
        echo "sent";
    }else{
        echo "error";
    }
?>