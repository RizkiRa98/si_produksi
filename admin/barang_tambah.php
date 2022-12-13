<?php
include '../koneksi.php';
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

    <title>Tambah Barang</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">CV. Renosaf Mebeul </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <div class="sidebar-heading">
                Kegiatan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="barang.php?barang">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Barang</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- KONTEN HALAMAN -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-warning topbar mb-4 static-top shadow">
                    <h3 class="mr-2 d-none d-lg-inline text-dark font-weight-bold large">Selamat Datang Kepala Produksi</h3>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
                    </div>

                    <!-- Form Tambah -->
                    <form action="../fungsi/tambahBarang.php" enctype="multipart/form-data" method="POST">
                        <div id="add_more" class="add_more">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input type="text" name="id_barang" id="id_barang" class="form-control" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang[]" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" autocomplete="off" required="required">
                                </div>
                                <div class="col" style="margin-top: 30px;"><a href="#" class="btn btn-success add_item_btn mb-4" id="add">Tambah</a></div>
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                        <a class="btn btn-secondary" href="barang.php?barang">Kembali</a>

                    </form>


                </div>
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


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <script>
        $(document).ready(function(e) {
            var html = '<div id="add_more" class="add_more"><div class="form-group" id="row"><label>ID Barang</label><input type="text" name="id_barang" id="id_barang" class="form-control" readonly></div><div class="row"><div class="form-group col"><label for="nama_barang">Nama Barang</label><input type="text" name="nama_barang[]" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" autocomplete="off" required="required"></div><div class="col" style="margin-top: 30px;"><a href="#" class="btn btn-danger add_item_btn mb-4" id="remove">Hapus</a></div></div></div>';

            var maxRows = 10;
            var x = 1;
            //Add rows ke form
            $("#add").click(function(e) {
                if (x <= maxRows) {
                    $("#add_more").append(html);
                    x++;
                }
            });
            //Remove rows dari form
            $("#add_more").on('click', '#remove', function(e) {
                $(this).closest("#add_more").remove();
                x--;
            });
        });
    </script>
</body>


</html>