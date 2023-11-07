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
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h6 class="h3 mb-2 text-gray-800" style="font-family: 'Bodoni Moda', serif; font-size: 20px"><span style="color: #C0C0C0">Pages</span> / News </h6><br>
                    <h1>Upload News</h1>
                    <div class="container mt-5">
 
                    <form id="newsForm">
                        <div class="form-group">
                            <label for="newsDescription">News Description:</label>
                            <textarea class="form-control" id="newsDescription" name="description" rows="3" placeholder="Type Here"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="newsURL">URL Link:</label>
                            <input type="text" class="form-control" id="newsURL" name="url" placeholder="https://example.com">
                        </div>
                        <button type="button" id="submitNews" class="btn btn-primary">Submit</button>
                    </form>

       
    </div>
               
                </div>
                <div class="container2" style="margin: 20px">
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                               
                                <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">ID</th>
                                <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">DESCRIPTION</th>
                                <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">URL</th>
                                <th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;">ACTION</th>
                                
                            </tr>
                        <?php
                            include "db_connection.php";

                            $sql = "SELECT * FROM news";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row['id']. "</td>
                                        <td>" . $row['description']. "</td>
                                        <td>" . $row['url']."</td>
                                        <td>
                                            <a class='mr-2 edit-news' href='EditNews.php?id=" . $row['id'] . "' style='font-size: 30px;'>
                                                <i class='fa fa-edit text-success'></i>
                                            </a>
                                            <a href='#' data-id='" . $row['id'] . "' class='delete-news' style='font-size: 30px;'>
                                                <i class='fa fa-trash text-danger'></i>
                                            </a>
                                        </td>
                                    </tr>";
                                }
                            }
                        ?>


            </table>
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

 
    <script>
    $(document).ready(function () {
        $('#submitNews').click(function () {
            $.ajax({
                type: 'POST',
                url: 'UploadNews.php',
                data: $('#newsForm').serialize(),
                success: function (response) {
                    // Handle the response from the server
                    if (response === 'success') {
                        // Display a success SweetAlert
                        Swal.fire('Success', 'News uploaded successfully', 'success').then(function() {
                            // Reload the page or perform any other actions
                            location.reload();
                        });
                    } else {
                        // Display an error SweetAlert
                        Swal.fire('Error', 'Failed to upload news', 'error');
                    }
                },
                error: function () {
                    // Handle AJAX errors
                    Swal.fire('Error', 'AJAX request failed', 'error');
                }
            });
        });
    });
    $(document).ready(function () {
        // Edit News
        $('.edit-news').on('click', function (e) {
            e.preventDefault(); // Prevent the default link behavior

            var newsId = $(this).attr('href'); // Get the href attribute

            Swal.fire({
                title: 'Edit News',
                text: 'Are you sure you want to edit this news?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, edit it'
            }).then(function (result) {
                if (result.isConfirmed) {
                    // Redirect to the edit page with the newsId for editing
                    window.location.href ='EditNews.php?id' + newsId;
                }
            });
        });

        // Delete News
        $('.delete-news').on('click', function () {
            var newsId = $(this).data('id');

            Swal.fire({
                title: 'Confirm Delete',
                text: 'Are you sure you want to delete this news?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it'
            }).then(function (result) {
                if (result.isConfirmed) {
                    // Redirect to DeleteNews.php with the newsId for deletion
                    window.location.href = 'DeleteNews.php?id=' + newsId;
                }
            });
        });
    });
</script>

    

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

</html>