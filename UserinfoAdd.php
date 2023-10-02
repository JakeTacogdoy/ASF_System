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
                    <h1 class="h3 mb-2 text-gray-800">User Information</h1>
                    

                    <form action="Userinfo_process.php" method="post">
                        <div class="row">
                           
                            <div class="form-group col-md-4">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="middleName">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter Middle Name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-md-4">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contactNo">Contact No.</label>
                                <input type="tel" class="form-control" id="contactNo" name="contactNo" placeholder="Enter Contact No." required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="barangay">Barangay</label>
                                <select class="form-control" id="barangay" name="barangay" required>
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
                        <div class="row">
                        <div class="form-group col-md-4">
                                <label for="farmNo">Purok</label>
                                <input type="text" class="form-control" id="purok" name="purok" placeholder="Enter Purok" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="farmNo">No. Farm</label>
                                <input type="number" class="form-control" id="farmNo" name="farmNo" placeholder="Enter No. Farm" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pigsNo">No. Pigs</label>
                                <input type="number" class="form-control" id="pigsNo" name="pigsNo" placeholder="Enter No. Pigs" required>
                            </div>
                           
                        </div>
                        <div class="row">
           
                          </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div id="map" style="width: 90%; height: 300px;"></div>
                            </div>
                            <div class="col-md-6">
                            <br>  <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude" required>
                                </div>
                            
                        
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter Longitude" required>
                                </div>
                            </div>
                        </div>

                                    <br>  <button type="submit" class="btn btn-primary">Add Admin</button>
                                    </form>
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

    <script type="text/javascript">
       
       var map = L.map('map').setView([10.3959, 124.9427], 17);
       L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

        var blueIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41],
        });

        var markers = L.layerGroup().addTo(map);

        // Add an event listener for clicks on the map
        map.on('click', function(e) {
            var latitude = e.latlng.lat;
            var longitude = e.latlng.lng;

            // Update the latitude and longitude in the form
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);

            var marker = L.marker([latitude, longitude], { icon: blueIcon }).addTo(markers);

            // Add a popup to show the coordinates
            marker.bindPopup(`Latitude: ${latitude}<br>Longitude: ${longitude}`).openPopup();
        });

        $('#addMarker').click(function() {
            var latitude = $('#latitude').val();
            var longitude = $('#longitude').val();

            if (!isNaN(latitude) && !isNaN(longitude)) {
                var latlng = L.latLng(parseFloat(latitude), parseFloat(longitude));

                var marker = L.marker(latlng, { icon: blueIcon }).addTo(markers);

                // You can add a popup with marker information here
                marker.bindPopup(`Latitude: ${latitude}<br>Longitude: ${longitude}`).openPopup();

                // Clear the latitude and longitude fields
                $('#latitude').val('');
                $('#longitude').val('');
            } else {
                alert("Invalid latitude or longitude. Please enter numeric values.");
            }
        });

    </script>

</body>

</html>