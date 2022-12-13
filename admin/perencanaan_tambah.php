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

    <title>Tambah Perencanaan</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
                <a class="nav-link" href="perencanaan.php?perencanaan">
                    <i class="fas fa-fw fa-sticky-note"></i>
                    <span>Perencanaan</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="tipeproduk.php?produk">
                    <i class="fas fa-fw fa-couch"></i>
                    <span>Produk</span></a>
            </li> -->

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Perencanaan</h1>
                    </div>
                    <?php
                    include '../koneksi.php';
                    $query = mysqli_query($conf, "SELECT max(id_perencanaan) as kodeTerbesar from perencanaan");
                    $data = mysqli_fetch_array($query);
                    $idRencana = $data['kodeTerbesar'];

                    $urutan = (int)substr($idRencana, 1, 3);
                    $urutan++;

                    $huruf = "R";
                    $idRencana = $huruf . sprintf("%03s", $urutan);
                    ?>
                    <!-- Form Tambah -->
                    <form action="../fungsi/tambahPerencanaan.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label>ID Perencanaan</label>
                            <input type="text" name="id_perencanaan" id="id_perencanaan" class="form-control" value="<?= $idRencana; ?>" readonly>
                        </div>

                        <div class="form-group" hidden>
                            <label for="id_user">ID Pengguna</label>
                            <?php
                            include '../koneksi.php';
                            $query1 = mysqli_query($conf, "SELECT id_user from user WHERE id_user = '1'");
                            while ($data1 = mysqli_fetch_array($query1)) {
                            ?>
                                <input name="id_user" class="form-control" required value="<?= $data1['id_user']; ?>" readonly>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="nama_konsumen">Nama Konsumen</label>
                            <input type="text" name="nama_konsumen" id="nama_konsumen" class="form-control" placeholder="Masukkan Nama Konsumen" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="nama_pelaksana">Nama Ketua Grup</label>
                            <input type="text" name="nama_pelaksana" id="nama_pelaksana" class="form-control" placeholder="Masukkan Nama Pelaksana">
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select name="id_barang" class="form-control">
                                <?php
                                include '../koneksi.php';
                                $query = mysqli_query($conf, "SELECT * FROM barang");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $data['id_barang']; ?>">
                                        <?= $data['nama_barang']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tgl_order">Tanggal Order</label>
                            <input type="date" name="tgl_order" id="tgl_order" class="form-control" style="width: 30%;">
                        </div>

                        <!-- <div class="row">
                            <div class="form-group col">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" class="form-control" required>
                                    <option selected="selected">-- Bulan --</option>
                                    <?php
                                    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                    $jlh_bln = count($bulan);
                                    for ($c = 0; $c < $jlh_bln; $c += 1) {
                                        echo "<option value=$bulan[$c]> $bulan[$c] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="tahun">Tahun</label>
                                <?php
                                $now = date("Y");
                                echo "<select name='tahun' class='form-control'>
						<option>-- Tahun --</option>";
                                for ($a = 2012; $a <= $now; $a++) {
                                    echo "<option value='$a'>$a</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Minggu</label>
                            <select name="minggu" id="minggu" class="form-control">
                                <option value="">-- Minggu Ke--</option>
                                <option value="Satu">Satu</option>
                                <option value="Dua">Dua</option>
                                <option value="Tiga">Tiga</option>
                                <option value="Empat">Empat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Quantity Bahan (Set)</label>
                            <input type="text" name="qty" id="qty" class="form-control" required>
                        </div> -->

                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>

                        <a class="btn btn-secondary" href="perencanaan.php?perencanaan">Kembali</a>

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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
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
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>