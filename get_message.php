<?php
    include "db_connection.php";

    $id = $_GET['user_id'];

    foreach(mysqli_query($conn, "SELECT * FROM messages WHERE (from_id = $id AND to_id = 9)  OR (from_id = 9 AND to_id = $id)") as $row){
    if($row['from_id'] != 0){?>
        <div class="message-box message-user">
        <?php echo $row['message'] ?>
        </div>
    <?php
    }elseif($row['from_id'] == 0){?>
        <div class="message-box">
        <?php echo $row['message'] ?>
        </div>
    <?php
    }
    }
?>