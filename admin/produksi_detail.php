<?php
include '../koneksi.php';
$id_produksi = $_GET['id_produksi'];
$query = mysqli_query($conf, "SELECT * FROM produksi WHERE id_produksi='$id_produksi'");
while ($data = mysqli_fetch_array($query)) {
?>
    <style>
        .table {
            @media (max-width: 1409px) {
                width: 100%;
            }
        }
    </style>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Detail Produksi</title>
        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="produksi.php">
                    <div class="sidebar-brand-text mx-3">CV. Renosaf Mebeul </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <div class="sidebar-heading">
                    Kegiatan
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="produksi.php?produksi">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Produksi</span></a>
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
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Detail Produksi</h1>
                        </div>

                        <!-- Tabel Produksi -->
                        <table class="table table-striped table-hover table-bordered w-100">
                            <tr>
                                <td class="w-50">ID Produksi</td>
                                <td class="text-left"><?php echo $data['id_produksi'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Nama Konsumen</td>
                                <td class="text-left"><?php echo $data['nama_konsumen'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Nama Ketua Grup</td>
                                <td class="text-left"><?php echo $data['nama_pelaksana'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Nama Barang</td>
                                <?php
                                $id_barang = $data['id_barang'];
                                include '../koneksi.php';
                                $query1 = mysqli_query($conf, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
                                while ($data1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <td class="text-left"><?php echo $data1['nama_barang'] ?></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td class="w-50">Tanggal Mulai Produksi</td>
                                <td class="text-left"><?php echo $data['tgl_mulai'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Tanggal Akhir Produksi</td>
                                <td class="text-left"><?php echo $data['tgl_akhir'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Tanggal Selesai</td>
                                <td class="text-left"><?php echo $data['tgl_selesai'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Status</td>
                                <td class="text-left"><?php echo $data['status'] ?></td>
                            </tr>

                            <tr>
                                <td class="w-50">Keterangan</td>
                                <td class="text-left"><?php echo $data['catatan'] ?></td>
                            </tr>
                        </table>
                        <a class="btn btn-secondary" href="produksi.php?produksi">Kembali</a>

                    <?php } ?>


                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

    </body>

    </html>