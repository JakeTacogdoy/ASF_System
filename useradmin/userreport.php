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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include ("usermenu.php");

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
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>


                    </ul>

                </nav>


    
<body>
    <div class="container mt-4">
        <h2>Submit a Report</h2>
        <form id="reportForm" method="post" action="submit_report.php">
            <div class="form-group">
                <label for="reporter_name">Your Name:</label>
                <input type="text" class="form-control" id="reporter_name" name="reporter_name" required>
            </div>
            <div class="form-group">
                <label for="report_content">Report Content:</label>
                <textarea class="form-control" id="report_content" name="report_content" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Report</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Report Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../db_connection.php');

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $reporter_name = $_POST['reporter_name'];
                $report_content = $_POST['report_content'];

                // Insert the report into the 'submitted_reports' table
                $insert_sql = "INSERT INTO report (reporter_name, report_content) VALUES ('$reporter_name', '$report_content')";
                if (mysqli_query($conn, $insert_sql)) {
                    echo "Report submitted successfully";
                } else {
                    echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
                }
            }

            // Fetch reports submitted by the logged-in user from the 'submitted_reports' table
            $id = $_SESSION['id']; // Assuming you have user ID stored in the session
            $sql = "SELECT * FROM report WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['reporter_name'] . "</td>";
                    echo "<td>" . $row['report_content'] . "</td>";
                    echo "<td><a href='edit_report.php?id=" . $row['id'] . "'>Edit</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No reports submitted yet</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

    <script>
        // JavaScript to show SweetAlert after form submission
        document.getElementById('reportForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            let form = this;

            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => {
                if (response.ok) {
                    // If the response is successful, show the SweetAlert
                    Swal.fire('Report Submitted!', '', 'success').then(() => {
                        window.location = 'userreport.php'; // Redirect after showing the alert
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

</body>
</html>
