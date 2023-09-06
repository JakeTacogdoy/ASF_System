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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: linear-gradient(36deg, #E8E62B, #E8872B, #2BE8E6) ;">

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
                                <span class="mr-2 d-none d-lg-inline text-white-600 small">Admin</span>
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



                    <!-- Content Row -->

                    <div class="row">

                        <div class="col-lg-12 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3" style="background: linear-gradient(36deg, #E8E62B, #E8872B, #2BE8E6);">
                                    <center><h2 class="m-0 font-weight-bold text-dark">BARANGAY LIBAS</h2></center>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-4 px-sm-4 mt-4 mb-4" style="width: 25rem;"
                                            src="img/Logo.jpg" alt="...">
                                

                                    <center><h5 class="m-0 font-weight-bold text-dark" style="font-family: Century Gothic;">BARANGAY OFFICIALS</h5></center>
                                    <center><h5 class="m-0 font-weight-bold text-dark" style="font-family: Century Gothic;">S.Y 2018 - 2022</h5></center>

                                     <table class="table table-hover">
                                <tr class="bg-warning text-white text-center">
                                    <td>Position</td>
                                    <td>Name</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Captain</td>
                                    <td>HON. LEVI T. GALDO</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Secretary</td>
                                    <td>HON. JEZALYN E. MEODE</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Treasurer</td>
                                    <td>HON. OMEGA I. OCTOBRE</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 1</td>
                                    <td>HON. ROMMEL M. SIDAYA</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 2</td>
                                    <td>HON. FELIX M. LASQUITES</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 3</td>
                                    <td>HON. DAVID T. TUBLE</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 4</td>
                                    <td>HON. DEXTER T. APLAN</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 5</td>
                                    <td>HON. ELISEO M. CALOOY</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 6</td>
                                    <td>HON. CRISPIN G. VALDE</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay Councilor 7</td>
                                    <td>HON. CARMELITA S. TINIO</td>
                                </tr>
                                </tr>
                                <tr class="text-center">
                                    <td>Barangay SK Chairperson </td>
                                    <td>HON. MIANEZA A. TOMON</td>
                            </table>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row ">

                         <!-- POPULATION -->
                        
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL POPULATION</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                       $sql = "SELECT * from residents";
                        
                        if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
    
                        printf($rowcount);

                        }

                    ?>           

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                TOTAL MALE</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                       $sql = "SELECT * from residents where Sex='Male';";
                        
                        if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
    
                        printf($rowcount);
                        
                        }

                    ?>           

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-male fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL FEMALE
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        
                    <?php
                       $sql = "SELECT * from residents where Sex='Female';";
                        
                        if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
    
                        printf($rowcount);
                        
                        }

                    ?>  

                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-female fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                



            <!-- End of Main Content -->

           
        
        <!-- End of Content Wrapper -->

   
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    

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