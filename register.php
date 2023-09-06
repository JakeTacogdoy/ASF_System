<?php
    session_start();

    require_once('db_connection.php');

?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-warning">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                 <?php
                        $sql = "Select * from users";
                        $results = $conn->query($sql);

                    ?>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block img-thumbnail"><center><img src="img/reg.jpg"></center></div>
                            <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-skyblue-7000 mb-4">Create an Account!</h1>
                            </div>
                    <?php
                        $sql = "Select * from residents order by FirstName";
                        $results = $conn->query($sql);

                    ?>                           
                             <form action = "registersave.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="FirstName" id="FirstName" class="form-control form-control-user" placeholder="First Name" value="<?php echo isset($FirstName) ? $FirstName : ''; ?>"  required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="LastName" id="LastName" class="form-control form-control-user" placeholder="Last Name" value="<?php echo isset($LastName) ? $LastName : ''; ?>"  required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="UserName" id="UserName" class="form-control form-control-user" placeholder="User Name" value="<?php echo isset($UserName) ? $UserName : ''; ?>"  required/>
                                </div>
                                <div class="form-group">
                                        <input type="text" name="Password" id="Password" class="form-control form-control-user" placeholder="Password" value="<?php echo isset($Password) ? $Password : ''; ?>"  required/>
                                </div>
                                <button class="btn btn-warning btn-user btn-block">
                                    Register
                                </button>
                                <hr>
                                
                            </form>
                            
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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

</body>

</html>