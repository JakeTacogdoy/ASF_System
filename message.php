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
<script>
    function search() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("userTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) { // Start loop from 1 to skip the header row
            var found = false; // Flag to indicate if the search term is found in any of the fields

            // Loop through each td in the current tr
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true; // Set flag if search term is found in this td
                        break; // No need to continue checking other tds
                    }
                }
            }

            // Set display style based on whether search term is found
            tr[i].style.display = found ? "" : "none";
        }
    }
</script>

<style>
    #searchInput {
    width: 300px;
    padding: 10px;
    margin-bottom: 10px;
}

/* Style for the table */
#userTable {
    width: 100%;
    border-collapse: collapse;
}

#userTable th, #userTable td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#userTable th {
    background-color: #f2f2f2;
}

#userTable tr:nth-child(even) {
    background-color: #f9f9f9;
}

#userTable tr:hover {
    background-color: #ddd;
}

/* Style for the message button */
button {
    padding: 8px 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

button:hover {
    background-color: #0056b3;
}
</style>
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
                <?php
                    // Include your database connection code here
                    include('db_connection.php');

                    // Query to fetch users from the database
                    $sql = "SELECT id, username FROM users";
                    $result = $conn->query($sql);

                    ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="container mt-5">
        <h1>User List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Start Chat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Display each user as a row in the table with a link to start a chat
                        echo '<tr>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td><a href="messageconvo.php?sender_id=1&receiver_id=' . $row['id'] . '" class="btn btn-primary">Start Chat</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="2">No users found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>


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
<script type="text/javascript">
      function addAdmin() {
        var emailInput = document.getElementById("email");
        var emailValue = emailInput.value;

        // Check if the email contains "@"
        if (emailValue.indexOf("@") === -1) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Email Address',
                text: 'Please enter a valid email.'
            });
            return; // Don't submit the form
        }

        var passwordInput = document.getElementById("password");
        var confirmPasswordInput = document.getElementById("confirmPassword");
        var passwordValue = passwordInput.value;
        var confirmPasswordValue = confirmPasswordInput.value;

        // Check if password and confirm password match
        if (passwordValue !== confirmPasswordValue) {
            Swal.fire({
                icon: 'error',
                title: 'Passwords Mismatch',
                text: 'Please make sure passwords match.'
            });
            return; // Don't submit the form
        }

        // If the email and passwords are valid, submit the form
        $.ajax({
            url: 'Add_admin_process.php',
            type: 'POST',
            data: $('form').serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Account Added Successfully',
                    showConfirmButton: false,
                    timer: 2000
                });

                setTimeout(function(){
                    window.location.href = 'Account.php'; // Redirect after 2 seconds
                }, 2000);
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                });
                console.error(error);
            }
        });
    }
</script>
</html>