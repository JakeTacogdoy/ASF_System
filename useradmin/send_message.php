<?php
    session_start();
    include "../db_connection.php";

    $message = $_POST['message'];
    $customer_id = $_SESSION['customer_id'];

    $query = mysqli_query($conn, "INSERT INTO messages(from_id, to_id, message) VALUES ('$customer_id', 0, '$message')");
    if($query){
        echo "sent";
    }else{
        echo "error";
    }

?>