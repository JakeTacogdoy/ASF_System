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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php
            include ("menu.php");

        ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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
                <div class="container">
    <h6 class="h3 mb-2 text-gray-800" style="font-family: 'Bodoni Moda', serif; font-size: 20px">
        <span style="color: #C0C0C0">Pages</span> / Warnings
    </h6>
    <h1 class="mt-4">Send Warnings</h1>
    <div class="mt-4">
        <form action="warning_send.php" method="post">
            <div class="form-group">
                <label for="message">Enter warning message:</label>
                <textarea class="form-control" name="message" id="message" rows="4" placeholder="Enter warning message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Warning to Users</button>
        </form>
    </div>

    <div class="mt-4">
        <h2>Manage Warnings</h2>
        <div style="max-height: 300px; overflow: auto;">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>User</th>
                        <th>Message</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('db_connection.php');
                    $warningQuery = "SELECT w.id AS warning_id, u.FirstName, w.message, w.created_at
                                    FROM warnings w
                                    JOIN users u ON w.user_id = u.id";
                    $res = $conn->query($warningQuery);

                    while ($row = $res->fetch_assoc()) {
                        $warningId = $row["warning_id"];
                        $userFirstName = $row["FirstName"];
                        $message = $row["message"];
                        $timestamp = $row["created_at"];

                        echo "<tr>";
                        echo "<td>$userFirstName</td>";
                        echo "<td>$message</td>";
                        echo "<td>$timestamp</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Add the "Delete All" button -->
        <button id="delete-all-button" class="btn btn-danger">Delete All</button>
    </div>
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
  


<script type="text/javascript">
   $(document).ready(function () {
    // Add a click event listener for the "Send Warning to Users" button
    $('#submit').on('click', function (event) {
        event.preventDefault(); // Prevent the form submission

        // Use AJAX to send a request to send the warning to all users
        $.ajax({
            url: 'warning_send.php', // Replace with the actual URL for sending warnings
            type: 'POST',
            data: {
                message: $('#message').val(), // Get the message from the textarea
            },
            success: function (data) {
               
                    // Show a success message with SweetAlert
                    Swal.fire('Success', 'The warning message has been sent to all users.', 'success');
                    // Clear the message textarea
                    $('#message').val('');
                
            },
            error: function () {
                // Show an error message with SweetAlert
                Swal.fire('Error', 'Error sending the warning message', 'error');
            }
        });
    });
});


    $(document).ready(function () {
        // Add a click event listener for the "Delete All" button
        $('#delete-all-button').on('click', function () {
            // Show a confirmation dialog using SweetAlert
            Swal.fire({
                title: 'Delete All Warnings',
                text: 'Are you sure you want to delete all warning messages?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete all',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Use AJAX to send a request to delete all warnings
                    $.ajax({
                        url: 'warning_delete.php',
                        type: 'POST',
                        success: function (data) {
                            // Show a success message with SweetAlert
                            Swal.fire('Deleted All Warnings', 'All warning messages have been deleted.', 'success')
                                .then(() => {
                                    // Reload the page to update the warning list
                                    location.reload();
                                });
                        },
                        error: function () {
                            // Show an error message with SweetAlert
                            Swal.fire('Error', 'Error deleting all warnings', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

    

</body>
</html>