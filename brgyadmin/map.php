<?php
    session_start();

    require_once('../db_connection.php');

    $hasLogin = (isset($_SESSION['hasLogin'])?$_SESSION['hasLogin']:0);

    if (empty($hasLogin)){
        header("location: login.php");
        exit;
    }
    $usertype = isset($_SESSION['usertype']) ? strtolower($_SESSION['usertype']) : '';
    if ($usertype === 'brgy-admin') {
    // Redirect to a page with an appropriate message or simply deny access
    header("location: ../unauthorized.php");
    exit;
    }


    function isWithinRadius($centerLat, $centerLon, $targetLat, $targetLon) {
        $earthRadius = 6371000; // Radius of the Earth in meters
    
        $dLat = deg2rad($targetLat - $centerLat);
        $dLon = deg2rad($targetLon - $centerLon);
    
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($centerLat)) * cos(deg2rad($targetLat)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    
        $distance = $earthRadius * $c; // Distance in meters
    
        return $distance <= 500;
    }
?>

<!DOCTYPE html>
<html lang="en">

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
                                <img class="img-profile rounded-circle"src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../brgyadmin/logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?php
$sql = "Select * from owners";
$owners = $conn->query($sql);

echo "<script>document.addEventListener('DOMContentLoaded', function() { initMap(); });</script>";
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col" id="mapid" style="height: 580px;"></div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
    var map;
    var marker;
    var latitudeInput = document.getElementById('latitude');
    var longitudeInput = document.getElementById('longitude');

    function initMap() {
        map = L.map('mapid').setView([10.3943, 124.9754], 18);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        <?php 
        // Example usage:
        // $centerLatitude = 10.059410; // Example latitude
        // $centerLongitude = 125.159160; // Example longitude

        foreach ($owners as $owner) { 
            $targetLatitude = $owner['latitude']; 
            $targetLongitude = $owner['longitude']; 

            if ($owner['is_positive'] == 1) {
        ?>  
            // Circle radius 
            var circle = L.circle([<?php echo $owner['latitude']; ?>, <?php echo $owner['longitude']; ?>], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.1,
                radius: 500
            }).addTo(map);
            // User info
            console.log('Positive : <?php echo $owner['firstname']; ?>');
            L.marker([<?php echo $owner['latitude']; ?>, <?php echo $owner['longitude']; ?>]).addTo(map)
                .bindPopup(`<p style="background-color:red; font-family: 'Allerta', sans-serif; font-size: 20px; color: white;">Warning! within the radius!</p><br>
                Status: <?php echo $owner['is_positive']; ?><br>
                Name: <?php echo $owner['firstname']; ?> <?php echo $owner['lastname']; ?><br>
                Contact: <?php echo $owner['contact']; ?><br>
                No.Pigs: <?php echo $owner['pig']; ?><br>
                Coordinates: <?php echo $owner['latitude']; ?>,<?php echo $owner['longitude']; ?><br>
                `)
                .openPopup();
        <?php 
            } else {
                // Display markers without a circle radius or warning
        ?>
            L.marker([<?php echo $owner['latitude']; ?>, <?php echo $owner['longitude']; ?>]).addTo(map)
                .bindPopup(`Status: <?php echo $owner['is_positive']; ?><br>
                Name: <?php echo $owner['firstname']; ?>  <?php echo $owner['lastname']; ?><br>
                Contact: <?php echo $owner['contact']; ?><br>
                No.pigs: <?php echo $owner['pig']; ?><br>
                Coordinates: <?php echo $owner['latitude']; ?>,<?php echo $owner['longitude']; ?>`);
        <?php          
            }
        }
        ?>
    }
</script>

                    <!-- Page Heading -->
                    

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
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

 

</body>

</html>