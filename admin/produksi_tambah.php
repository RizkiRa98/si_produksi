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

    <title>Tambah Produksi</title>

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
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Produksi</h1>
                    </div>

                    <!-- Form Tambah -->

                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                        <div class="form-group">
                            <label for="id_penjadwalan">Pilih Jadwal Produksi</label>
                            <input type="submit" value="pilih" class="btn-sm btn-success">
                            <a href="produksi_tambah.php" class="btn-sm btn-warning">refresh</a>
                            <select name="id_penjadwalan" class="form-control">
                                <?php
                                include '../koneksi.php';
                                $id_penjadwalan = $_GET['id_penjadwalan'];
                                $query = mysqli_query($conf, "SELECT * FROM penjadwalan ORDER BY id_penjadwalan");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $data['id_penjadwalan'] ?>"><?= $data['id_penjadwalan'] . " - " . $data['nama_konsumen'] . " - " . $data['tgl_mulai'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>

                    <hr>
                    <form action="../fungsi/tambahProduksi.php" enctype="multipart/form-data" method="POST">
                        <!-- <div class="form-group">
                            <label for="id_produksi">ID Produksi</label>
                            <input type="text" name="id_produksi" id="id_produksi" class="form-control" placeholder="Masukkan ID Produksi">
                        </div> -->
                        <div class="form-group" hidden>
                            <label for="id_user" hidden>ID Pengguna</label>
                            <?php
                            include '../koneksi.php';
                            $query1 = mysqli_query($conf, "SELECT id_user from user WHERE id_user = '1'");
                            while ($data1 = mysqli_fetch_array($query1)) {
                            ?>
                                <input name="id_user" class="form-control" required value="<?= $data1['id_user']; ?>" hidden>
                            <?php } ?>
                        </div>
                        <?php
                        include '../koneksi.php';
                        if (isset($_GET['id_penjadwalan'])) {
                            $id_penjadwalan = $_GET['id_penjadwalan'];
                            $query1 = mysqli_query($conf, "SELECT * FROM penjadwalan where id_penjadwalan='$id_penjadwalan'");
                            $data1 = mysqli_fetch_array($query1);
                        ?>
                            <div class="form-group">
                                <label for="id_penjadwalan">ID Penjadwalan</label>
                                <input type="text" name="id_penjadwalan" id="id_penjadwalan" class="form-control" placeholder="Masukkan ID Produksi" value="<?= $data1['id_penjadwalan']; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama_konsumen">Nama Konsumen</label>
                                <input type="text" name="nama_konsumen" id="nama_konsumen" class="form-control" placeholder="Masukkan Nama Konsumen" value="<?= $data1['nama_konsumen']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_pelaksana">Nama Ketua Grup</label>
                                <input type="text" name="nama_pelaksana" id="nama_pelaksana" class="form-control" placeholder="Masukkan Nama Pelaksana" value="<?= $data1['nama_pelaksana']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <select name="id_barang" class="form-control">
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT * FROM barang");
                                    while ($data2 = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $data2['id_barang']; ?>" <?php if ($data1['id_barang'] == $data2['id_barang'])
                                                                                        echo 'selected="selected"';
                                                                                    ?>>
                                            <?= $data2['nama_barang'];
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="tgl_mulai">Tanggal Mulai Produksi</label>
                                    <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" value="<?= $data1['tgl_mulai']; ?>">
                                </div>
                                <div class="form-group col">
                                    <label for="tgl_akhir">Tanggal Akhir Produksi</label>
                                    <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" value="<?= $data1['tgl_akhir'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label for="tgl_selesai">Tanggal Selesai</label>
                                <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai" readonly>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</labelf>
                                    <select name="status" class="form-control">
                                        <option value="Menunggu">Menunggu</option>
                                        <option value="Diproses">Diproses</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="catatan">Keterangan <b>*Harus mengandung kata "belum", "kurang", "ganti", "lebih", dan "cukup"*</b> </label>
                                <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Masukkan Catatan">
                            </div>

                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                            <a class="btn btn-secondary" href="produksi.php?produksi">Kembali</a>

                    </form>
                <?php  } ?>

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

</body>

</html>