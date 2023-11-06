<?php
session_start();
require_once('../db_connection.php');

$hasLogin = (isset($_SESSION['hasLogin']) ? $_SESSION['hasLogin'] : 0);

if (empty($hasLogin)) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the report details for editing
    $sql = "SELECT * FROM report WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the form for editing the report
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php 
            include("userheader.php"); 
        ?>
        <body id="page-top">
            <div id="wrapper">
                <?php 
                    include("usermenu.php"); 
                ?>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                            <ul class="navbar-nav ml-auto">
                                <!-- User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-white-600 small"><?php echo $_SESSION['username'] ?></span>
                                        <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                                    </a>
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

                        <div class="container mt-4">
                            <h2>Edit Report</h2>
                            <form id="editReportForm" method="post" action="update_report.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="reporter_name">Your Name:</label>
                                    <input type="text" class="form-control" id="reporter_name" name="reporter_name" value="<?php echo $row['reporter_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="report_content">Report Content:</label>
                                    <textarea class="form-control" id="report_content" name="report_content" rows="4" required><?php echo $row['report_content']; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Report</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        
        </html>
        <?php
    } else {
        // If the report ID is not found
        echo "Report not found for editing";
    }
}
?>
