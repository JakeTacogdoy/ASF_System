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
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
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
                    

                    <form action="../brgyadmin/userinfoprocess.php" method="post">
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
                                <label for="contactNo">Contact No.</label>
                                <input type="tel" class="form-control" id="contactNo" name="contactNo" placeholder="Enter Contact No." required>
                            </div>
                           
                            <div class="form-group col-md-4">
                                <label for="pigsNo">No. Pigs</label>
                                <input type="number" class="form-control" id="pigsNo" name="pigsNo" placeholder="Enter No. Pigs" required>
                            </div>
                        </div>
                        
                        <div class="row">
                        <div class="form-group col-md-4">
                            <label for="positive">Status</label>
                            <div style="display: flex; align-items: center;">
                                <label style="margin-right: 10px;">
                                    <input type="radio" name="positive" id="positive" value="1" >
                                    Positive
                                </label>
                                <label>
                                    <input type="radio" name="positive" id="positive" value="0">
                                    Negative
                                </label>
                            </div>
                        </div>
                          </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div id="mapid" style="width: 90%; height: 300px;"></div>
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

                                    <br>  <button type="submit" class="btn btn-primary">Add User</button>
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

    
<script>
var map;
var marker;
var latitudeInput = document.getElementById('latitude');
var longitudeInput = document.getElementById('longitude');

function initMap() {
  map = L.map('mapid').setView([10.395911295892605, 124.94326335612267], 18);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18
  }).addTo(map);

  map.on('click', function (event) {
    var lat = event.latlng.lat;
    var lng = event.latlng.lng;

    // Update the marker's position
    if (marker) {
      marker.setLatLng([lat, lng]);
    } else {
      marker = L.marker([lat, lng]).addTo(map);
    }

    // Update the input fields with the latitude and longitude
    latitudeInput.value = lat;
    longitudeInput.value = lng;
  });
}

// Call the initMap function once the page has loaded
document.addEventListener('DOMContentLoaded', function () {
  initMap();
});

document.getElementById('submitForm').addEventListener('click', function() {
    var latitude = document.getElementById('latitude').value;
    var longitude = document.getElementById('longitude').value;

    var formData = new FormData(document.getElementById('userinfoForm'));
    formData.append('latitude', latitude);
    formData.append('longitude', longitude);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'Userinfo_process.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            swal('Success!', 'User added successfully!', 'success');

            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup('<b>User Info:</b><br> Name: ' + formData.get('firstName') + ' ' + formData.get('lastName'));

            document.getElementById('userinfoForm').reset();
        } else {
            swal('Error!', 'An error occurred while adding user.', 'error');
        }
    };

    xhr.send(formData);
});
</script>

</body>

</html>