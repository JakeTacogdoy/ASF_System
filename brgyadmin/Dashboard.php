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
             
                 
                
                <div class="container mt-2">
                    <div class="alert alert-success" style="font-family: 'Cinzel', serif; font-size: 30px;" >
                        Welcome, <?php echo $_SESSION['username'] ?>
                    </div>
                </div>

                        
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    


                  

                            <!-- Illustrations -->


                    <!-- Content Row -->
                    <div class="row ">

                         <!-- POPULATION -->
                        
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL FARM OWNERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                       $sql = "SELECT * from owners";
                        
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
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL OF PIGS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                           
                        <?php
                        $sql = "SELECT SUM(pig) AS total_pigs FROM owners";
                        
                        if ($result = mysqli_query($conn, $sql)) {
                            $row = mysqli_fetch_assoc($result);
                            $totalPigs = $row['total_pigs'];
                            printf($totalPigs);
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
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL OF AFFECTIVE PIGS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        $sql = "SELECT * FROM owners WHERE is_positive = 1";
                        
                        if ($result = mysqli_query($conn, $sql)) {
                            $rowcount = mysqli_num_rows($result);
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

   

</body>

</html>