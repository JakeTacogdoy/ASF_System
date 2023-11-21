<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<div class="message-box">Hello <?php echo $_SESSION['username'];?>, what can I help you?</div>
<?php
    include "../db_connection.php";
    $customer_id = $_SESSION['id'];
    foreach(mysqli_query($conn, "SELECT * FROM messages WHERE (from_id = $customer_id AND to_id = 9)  OR (from_id = 9 AND to_id = $customer_id)") as $row){
    if($row['from_id'] == 0){?>
        <div class="message-box message-user">
        <?php echo $row['message'] ?>
        </div>
    <?php
    }elseif($row['from_id'] != 0){?>
        <div class="message-box">
        <?php echo $row['message'] ?>
        </div>
    <?php
    }
    }
?>