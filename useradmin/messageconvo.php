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
    include("../useradmin/userheader.php");
?>
<style>
    .message-box{
    width: fit-content;
    max-width: 80%;
    height: auto;
    background-color: rgb(189, 190, 190);
    padding: 5px 15px;
    border-radius: 20px;
    color: black;
    margin-bottom: 10px;
    }
    .message-user{
        margin-left: auto;
        background-color: rgb(2, 18, 167);
        color: white;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php
            include ("../useradmin/usermenu.php");

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
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
                <div class="container-fluid">
                    
                
                    <!-- Page Heading -->
                    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Chat with User 2</div>
            <div class="card-body" id="chat-box">
                <!-- Messages will be displayed here -->
            </div>
            <div class="card-footer">
                <div class="input-group">
                    <input type="text" id="message" class="form-control" placeholder="Type a message">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="sendMessage">Send</button>
                    </div>
                </div>
             
            </div>
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
<script type="text/javascript">
// Function to load messages
    function getMessages() {
            // Get the user_id from the URL
            var user_id = getUrlParameter('user_id');

            $.ajax({
                url: 'get_message.php',
                method: 'GET',
                data: {user_id},
                success: function (data) {
                    $('#chat-box').html(data);
                }
            });
    }

    // Fetch messages on page load
    $(document).ready(function () {
        getMessages();
    });

    // Refresh messages every 5 seconds
    setInterval(function () {
        getMessages();
    }, 5000);

    // Function to extract URL parameters
    function getUrlParameter(name) {
        var urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }


$(document).ready(function () {
    // Load messages when the page loads
    loadMessages();

    // Function to send a message
    $('#sendMessage').click(function () {
        var message = $('#message').val();

        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: {
                sender_id: senderId,
                receiver_id: receiverId,
                message: message
            },
            success: function () {
                loadMessages(); // Reload messages after sending
                $('#message').val(''); // Clear the input field
            }
        });
    });
});

</script>
</html>