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
<html>

<?php
    include("../brgyadmin/brgyheader.php");
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include ("../brgyadmin/brgymenu.php");

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: linear-gradient(36deg, #515bf0, #515bf0) ;">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">


                                                                                        

                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-white-600 small"><?php echo $_SESSION['username'] ?></span>
                                    <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="../logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>
                                </li>


                            </ul>

                            </nav>
    <div class="container mt-4">
        <h2>Accepted Reports</h2>

        <!-- Displaying the checked reports from the 'accepted_reports' table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Reporter's Name</th>
                    <th>Report Content</th>
                    <!-- You can add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                include('../db_connection.php'); // Include the database connection file

                // Fetch accepted reports from the 'accepted_reports' table
                $sql = "SELECT * FROM accepted_reports";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['reporter_name'] . "</td>";
                        echo "<td>" . $row['report_content'] . "</td>";
                        echo "<td><a href='delete_accepted_report.php?report_id=" . $row['report_id'] . "'><i class='fas fa-trash-alt'></i></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No accepted reports yet</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
