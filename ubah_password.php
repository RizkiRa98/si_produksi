<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lupa Password</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-img-cover" style="background-image: url('img/bg.jpg'); background-repeat: no-repeat;  background-position: center; background-size: cover;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">


                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="text-center text-gray-900 mb-4">Sistem Informasi Produksi <br>
                                            CV.Renosaf Mebeul</h1>
                                        <?php
                                        if (isset($_SESSION['status'])) {
                                        ?>
                                            <div class="alert alert-success">
                                                <h5><?= $_SESSION['status']; ?></h5>
                                            </div>
                                        <?php
                                            unset($_SESSION['status']);
                                        }
                                        ?>
                                        <h1 class="h4 text-gray-900 mb-4">Ubah Password</h1>
                                    </div>
                                    <form class="user" action="reset_password.php" method="POST">
                                        <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {
                                                                                                echo $_GET['token'];
                                                                                            } ?>">
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input readonly type="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                                    echo $_GET['email'];
                                                                                                } ?>" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Masukan Email Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_baru">Password Baru :</label>
                                            <input type="password_baru" name="password_baru" class="form-control form-control-user" id="password_baru" aria-describedby="emailHelp" placeholder="Masukan Email Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="konfirmasi_password">konfirmasi Password :</label>
                                            <input type="konfirmasi_password" name="konfirmasi_password" class="form-control form-control-user" id="konfirmasi_password" aria-describedby="emailHelp" placeholder="Masukan Email Anda">
                                        </div>
                                        <button type="submit" name="ubah-password" class="btn btn-primary btn-user btn-block">
                                            Ubah Password
                                        </button>
                                        <hr>

                                    </form>
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

</body>

</html>