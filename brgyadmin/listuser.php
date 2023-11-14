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
    include("brgyheader.php");
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h6 class="h3 mb-2 text-gray-800" style="font-family: 'Bodoni Moda', serif; font-size: 20px"><span style="color: #C0C0C0">Pages</span> / User </h6><br>

                    <?php
                        $sql = "Select * from owners order by lastname";
                        $results = $conn->query($sql); 

                    ?>

                   <!-- Add Button -->
                            <a href="UserinfoAdd.php" class="btn bg-primary text-white" style="margin-bottom:15px"><i class="fa fa-plus"></i>Add User</a>
                        <!-- End Add Button -->
                    <div class="card shadow mb-4">
                         
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                        <tr class="bg-gradient-dark text-white">
                                            <th>Action</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Contact No.</th>
                                            <th>No. Pigs</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Positive</th>
                                            
                                        </tr>
                                        </thead>

                                        <tbody>
                        <?php
                            foreach ($results as $line) {
                                echo "<tr>
                                    <td>
                                     
                                    <button type='button' class='btn btn-success mr-2' onclick='showEditAlert(". $line['id'] .")'>
                                    <i class='fa fa-edit'></i>
                                    </button>
                    
                                    <button type='button' class='btn btn-danger' onclick='showDeleteAlert(". $line['id'] .")'>
                                    <i class='fa fa-trash'></i>
                                     </button>




                                    </td>
                                    <td>".$line['firstname']."</td>
                                    <td>".$line['middlename']."</td>
                                    <td>".$line['lastname']."</td>
                                    <td>".$line['contact']."</td>
                                    <td>".$line['pig']."</td>
                                    <td>".$line['latitude']."</td>
                                    <td>".$line['longitude']."</td>
                                    <td>".$line['is_positive']."</td>
                                </tr>";
                            }
                        ?>
                        </tbody>
                                </table>
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
 

    <!-- Page level custom scripts -->
    

</body>
<script type="text/javascript">
    function showEditAlert(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Once edited, you will not be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, edit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'UserinfoEdit.php?id=' + id;
            }
        });
    }

    function showDeleteAlert(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Once deleted, you will not be able to recover this account!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).then(() => {
                    window.location.href = 'UserinfoDelete.php?id=' + id;
                });
            }
        });
    }
</script>

</html>