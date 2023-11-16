<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/DA.png" />

       <!---AJAX-->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
      body {
            background: #f8f9fa; /* Light Gray Background */
            font-family: 'Arial', sans-serif;
        }

        .card {
            background: #ffffff; /* White Card Background */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #msg {
            color: #dc3545; /* Red Text for Messages */
        }

        .logo {
            max-height: 100px;
            width: auto;
        }

        .form-control {
            border: 1px solid #ced4da; /* Light Gray Border for Input Fields */
        }

        .btn-primary {
            background-color: #007bff; /* Primary Blue Button Color */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker Blue on Hover */
            border-color: #0056b3;
        }
    </style>

</head>


<body>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/Swinesights.png" class="logo mb-3" alt="Logo">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <div id="msg"></div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                aria-describedby="emailHelp" placeholder="Enter username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password">
                                        </div>
                                        <a href="#" id="btnLogin" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $("#btnLogin").click(function (e) {
            e.preventDefault();
            var uname = $("#username").val();
            var pword = $("#password").val();

            if (uname == "") {
                Swal.fire({
                    title: 'Please enter your username',
                    icon: 'warning',
                    timer: 2000,
                    timerProgressBar: true,
                });
                return false;
            }

            if (pword == "") {
                Swal.fire({
                    title: 'Please enter your password',
                    icon: 'warning',
                    timer: 2000,
                    timerProgressBar: true,
                });
                return false;
            }

            $.ajax({
                url: "processlogin.php",
                type: "post",
                data: { "username": uname, "password": pword },
                success: function (response) {
                    if (response == "1") {
                        window.location = "index.php";
                    } else if (response == "2") {
                        window.location = "useradmin/index.php";
                    } else if (response == "3") {
                        window.location = "brgyadmin/Dashboard.php";
                    } else {
                        $("#msg").html(response);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        })
    </script>

  
</body>


</html>


