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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php
            include ("../useradmin/usermenu.php");

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
      
            <?php

            if ($hasLogin) {
                include('../db_connection.php');
                $userId = $_SESSION['id']; // Replace with your actual session variable

                // Retrieve the private warning messages and timestamps for the logged-in user
                $warningQuery = "SELECT message, created_at FROM warnings WHERE user_id = ?";
                $stmt = $conn->prepare($warningQuery);
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $res = $stmt->get_result();

                echo "<div class='container mt-5'>";
                echo "<h6 class='h3 mb-2 text-gray-800' style='font-family: \"Bodoni Moda\", serif; font-size: 20px'><span style='color: #C0C0C0'>Pages</span> / User </h6>";
                echo "<div class='mt-4'>";
                echo "<h2>Warning</h2>";
                echo "<ul class='list-group'>";

                while ($row = $res->fetch_assoc()) {
                    $message = $row["message"];
                    $timestamp = $row["created_at"];

                    echo "<li class='list-group-item'>
                    <i class='fa-solid fa-circle-exclamation' style='color: #fc1d1d;'></i>
                    $message <br> $timestamp
                    <span class='badge badge-info ml-auto'>From Admin</span>
                  </li>";

                }

                echo "</ul>";
                echo "</div>";
                echo "</div>";
            } else {
                // Display a message indicating that the user needs to log in.
                echo "Please log in to view your private warning messages.";
            }
            ?>



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

<script>
$(document).ready(function () {
    const $warningsLink = $('#warnings-link');
    const $newWarningBadge = $('#new-warning-badge');

    // Check if the "new" badge should be hidden based on local storage
    if (localStorage.getItem('hideNewWarningBadge') === 'true') {
        $newWarningBadge.hide();
    }

    // Add a click event handler for the "Warnings" link
    $warningsLink.on('click', function () {
        // Remove the "New" badge
        $newWarningBadge.hide();
        // Set a flag in local storage to remember that the badge is hidden
        localStorage.setItem('hideNewWarningBadge', 'true');
    });
});
</script>


</body>
</html>