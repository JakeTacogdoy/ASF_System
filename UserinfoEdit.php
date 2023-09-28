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
    include('header.php');
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include ('menu.php');

        ?>
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit</h1>
                        
                    </div>
                    <?php
                        $id = $_GET['id'];
                        $sql = "Select * from owners where id = ".$id;
                        $results = $conn->query($sql);
                        $row = $results->fetch_assoc();

                    ?>

                    <!-- Content Row -->
                    <form action="UserinfoUpdate.php" method="post">
                        <input type="hidden" name="hiddenID" value="<?=$id?>">

                        <div class="row">


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="firstName" class="form-control" value="<?= $row['firstname'] ?>">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="middleName" class="form-control" value="<?= $row['middlename'] ?>">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastName" class="form-control" value="<?= $row['lastname'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
                                </div>
                            </div>

                    
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="tel" name="contactNo" class="form-control" value="<?= $row['contact'] ?>">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Barangay</label>
                                    <select name="barangay" class="form-control">
                                        <option value="BENIT">BENIT</option>
                                        <option value="BUAC DAKU">BUAC DAKU</option>
                                    <option value="BUAC GAMAY">BUAC GAMAY</option>
                                    <option value="CABADBARAN">CABADBARAN</option>
                                    <option value="CONCEPCION">CONCEPCION</option>
                                    <option value="CONSOLACION">CONSOLACION</option>
                                    <option value="DAGSA">DAGSA</option>
                                    <option value="HIBOD-HIBOD">HIBOD-HIBOD</option>
                                    <option value="HINDANGAN">HINDANGAN</option>
                                    <option value="HIPANTAG">HIPANTAG</option>
                                    <option value="JAVIER">JAVIER</option>
                                    <option value="KAHUPIAN">KAHUPIAN</option>
                                    <option value="KANANGKAAN">KANANGKAAN</option>
                                    <option value="KAUSWAGAN">KAUSWAGAN</option>
                                    <option value="LP CONCEPCION">LP CONCEPCION</option>
                                    <option value="LIBAS">LIBAS</option>
                                    <option value="LOM-AN">LOM-AN</option>
                                    <option value="MABICAY">MABICAY</option>
                                    <option value="MAAC">MAAC</option>
                                    <option value="MAGATAS">MAGATAS</option>
                                    <option value="MAHAYAHAY">MAHAYAHAY</option>
                                    <option value="MALINAO">MALINAO</option>
                                    <option value="MARIA PLANA">MARIA PLANA</option>
                                    <option value="MILAGROSO">MILAGROSO</option>
                                    <option value="OLISIHAN">OLISIHAN</option>
                                    <option value="PANCHO VILLA">PANCHO VILLA</option>
                                    <option value="PANDAN">PANDAN</option>
                                    <option value="RIZAL">RIZAL</option>
                                    <option value="SALVACION">SALVACION</option>
                                    <option value="SF MABUHAY">SF MABUHAY</option>
                                    <option value="SAN ISIDRO">SAN ISIDRO</option>
                                    <option value="SAN JOSE">SAN JOSE</option>
                                    <option value="SAN JUAN (AGATA)">SAN JUAN (AGATA)</option>
                                    <option value="SAN MIGUEL">SAN MIGUEL</option>
                                    <option value="SAN PEDRO">SAN PEDRO</option>
                                    <option value="SAN ROQUE">SAN ROQUE</option>
                                    <option value="SAN VICENTE">SAN VICENTE</option>
                                    <option value="SANTA MARIA">SANTA MARIA</option>
                                    <option value="SUBA">SUBA</option>
                                    <option value="TAMPOONG">TAMPOONG</option>
                                    <option value="ZONE I">ZONE I</option>
                                    <option value="ZONE II">ZONE II</option>
                                    <option value="ZONE III">ZONE III</option>
                                    <option value="ZONE IV">ZONE IV</option>
                                    <option value="ZONE V">ZONE V</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
     
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>No. Farm</label>
                                    <input type="number" name="farmNo" class="form-control" value="<?= $row['farm'] ?>">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>No. Pigs</label>
                                    <input type="number" name="pigsNo" class="form-control" value="<?= $row['pig'] ?>">
                                </div>
                            </div>
                        </div>

                        <center>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </center>
                    </form>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>