<?php
    session_start();

    require_once('db_connection.php');

    $hasLogin = (isset($_SESSION['hasLogin'])?$_SESSION['hasLogin']:0);

    if (empty($hasLogin)){
        header("location: login.php");
        exit;
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include("header.php");
?>
<style>
#chatContainer {
    width: 300px;
    margin: 0 auto;
    border: 1px solid #ccc;
    box-shadow: 0 0 5px #ccc;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-top: 20px;
}

#chatHeader {
    text-align: center;
    background-color: #333;
    color: #fff;
    padding: 10px;
}

#chatMessages {
    max-height: 400px;
    overflow-y: scroll;
    margin-top: 10px;
}

#chatInput {
    display: flex;
    margin-top: 10px;
}

#message {
    flex: 1;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

#sendMessage {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 5px 10px;
    cursor: pointer;
}
</style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php
            include ("menu.php");

        ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                  <div class="container mt-5">
                        <h2>Private Chat</h2>
                        <div class="card">
                            <div class="card-body" id="chat-messages" style="height: 300px; overflow-y: auto;">
                                <!-- Messages will be displayed here -->
                            </div>
                            <div class="card-footer">
                                <form id="chat-form" onsubmit="sendMessage(); return false;">
                                    <div class="input-group">
                                        <input type="text" id="message" class="form-control" placeholder="Type a message..." required>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
<script type="text/javascript">
       function sendMessage() {
            var message = $('#message').val();
            if (message.trim() === "") {
                return; // Don't send empty messages
            }

            var sender_id = <?php echo $user_id; ?>;
            var receiver_id = /* Retrieve the receiver's ID here */;

            var data = {
                sender_id: sender_id,
                receiver_id: receiver_id,
                message: message
            };

            $.ajax({
                type: 'POST',
                url: 'send_message.php',
                data: data,
                success: function () {
                    // Clear the input field after sending the message
                    $('#message').val("");
                },
                error: function () {
                    alert('Message sending failed');
                }
            });
        }

        function getMessages() {
            var sender_id = <?php echo $user_id; ?>;
            var receiver_id = /* Retrieve the receiver's ID here */;

            var data = {
                sender_id: sender_id,
                receiver_id: receiver_id
            };

            $.ajax({
                type: 'POST',
                url: 'get_messages.php',
                data: data,
                success: function (data) {
                    $('#chat-messages').html(data);
                },
                error: function () {
                    console.log('Error fetching messages');
                }
            });
        }


        setInterval(getMessages, 2000);
</script>
</html>