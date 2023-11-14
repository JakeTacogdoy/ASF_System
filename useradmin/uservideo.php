<?php
    session_start();
    require_once('../db_connection.php');

    $hasLogin = (isset($_SESSION['hasLogin']) ? $_SESSION['hasLogin'] : 0);

    if (empty($hasLogin)) {
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
            include("../useradmin/usermenu.php");
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                    <h1 class="h3 mb-2 text-gray-800">Video Gallery</h1>
                    <p class="mb-4">Watch the latest videos uploaded by your barangay.</p>

                    <div class="row">
                        <?php
                            include "../db_connection.php";

                            $sql = "SELECT * FROM videos";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<div class='col-lg-4 mb-4'>
                                            <div class='card'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>" . $row['title'] . "</h5>";

                                    // Display video player with the video URL
                                    echo "<a href='#videoModal" . $row['id'] . "' data-toggle='modal'>";
                                    echo "<video width='100%' height='auto' controls>";
                                    echo "<source src='" . $row['video_url'] . "' type='video/mp4'>";
                                    echo "Your browser does not support the video tag.";
                                    echo "</video>";
                                    echo "</a>";

                                    // Bootstrap Modal
                                    echo "<div class='modal fade' id='videoModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='videoModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog modal-lg' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='videoModalLabel'>" . $row['title'] . "</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <video width='100%' height='auto' controls>
                                                            <source src='" . $row['video_url'] . "' type='video/mp4'>
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";

                                    echo "</div>
                                          </div>
                                        </div>";
                                }
                            } else {
                                echo "<p>No videos available.</p>";
                            }
                        ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
