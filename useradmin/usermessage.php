<?php
    session_start();

    require_once('../db_connection.php');

    
    $hasLogin = (isset($_SESSION['hasLogin'])?$_SESSION['hasLogin']:0);

    if (empty($hasLogin)){
        header("location: login.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
    
<?php
    include("userheader.php");
?>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .message-container {
            display: flex;
            height: 100vh;
        }
        .conversation {
            flex: 1;
            border-right: 1px solid #ccc;
            padding: 20px;
            overflow-y: scroll;
        }
        .message-input {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
        }
        input[type="text"], button {
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include ("usermenu.php");
        ?>
        <!-- End of Sidebar -->

<div class="message-container">
    <div class="conversation" id="message-display">
        <!-- Messages will be displayed here -->
    </div>
    <div class="message-input">
        <input type="text" id="message-text" placeholder="Type your message...">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<script>
function sendMessage() {
    let sender_id = 1; // Replace with the sender's ID
    let receiver_id = 2; // Replace with the receiver's ID
    let message = document.getElementById('message-text').value;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_message.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            fetchMessages(); // Fetch and display messages after sending a new one
            document.getElementById('message-text').value = ''; // Clear the message input field
        }
    };
    xhr.send('sender_id=' + sender_id + '&receiver_id=' + receiver_id + '&message_body=' + message);
}

function fetchMessages() {
    let sender_id = 1; // Replace with the sender's ID
    let receiver_id = 2; // Replace with the receiver's ID

    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'retrieve_messages.php?sender_id=' + sender_id + '&receiver_id=' + receiver_id, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            let conversation = document.getElementById('message-display');
            conversation.innerHTML = xhr.responseText;
            conversation.scrollTop = conversation.scrollHeight; // Scroll to the latest message
        }
    };
    xhr.send();
}

// Initial fetch of messages and periodic fetch every 5 seconds
fetchMessages(); // Initial fetch on page load
setInterval(fetchMessages, 5000); // Periodic fetch
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
</body>
</html>


