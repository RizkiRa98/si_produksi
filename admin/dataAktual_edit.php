<?php
include '../koneksi.php';
session_start();
$id_peramalan = $_GET['id_peramalan'];
$query = mysqli_query($conf, "SELECT * FROM peramalan WHERE id_peramalan='$id_peramalan'");

while ($data = mysqli_fetch_array($query)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tambah Data Aktual Penggunaan Bahan</title>

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
                    <a class="nav-link" href="peramalan.php?peramalan">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Peramalan</span></a>
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
                            <h1 class="h3 mb-0 text-gray-800">Ubah Data Aktual Penggunaan Bahan</h1>
                        </div>
                        <?php
                        include '../koneksi.php';
                        $query1 = "SELECT * from peramalan where id_peramalan = '$id_peramalan'";
                        $resultquery = mysqli_query($conf, $query1);

                        $data1 = mysqli_fetch_assoc($resultquery);

                        $bln_thn = $data1['bln_thn'];
                        $pecah = explode(" ", $bln_thn);
                        $bulan = $pecah[0];
                        $tahun = $pecah[1];
                        ?>
                        <!-- Form Tambah -->
                        <form action="../fungsi/ubahDataAktual.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group" hidden>
                                <label for="id_peramalan">ID Produksi</label>
                                <input type="text" name="id_peramalan" id="id_peramalan" class="form-control" placeholder="Masukkan ID Peramalan" value="<?php echo $data['id_peramalan'] ?>">
                            </div>
                            <div class="form-group" hidden>
                                <label for="id_user">ID User</label>
                                <input type="text" name="id_user" id="id_user" class="form-control" placeholder="Masukkan ID Peramalan" value="<?php echo $data['id_user'] ?>">
                            </div>
                            <div class="form-group" hidden>
                                <label for="id_alpha">ID Alpha</label>
                                <input type="text" name="id_alpha" id="id_alpha" class="form-control" placeholder="Masukkan ID Peramalan" value="<?php echo $data['id_alpha'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <select name="nama_barang" class="form-control">
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT * FROM barang");
                                    while ($data1 = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $data1['nama_barang']; ?>" <?php if ($data['nama_barang'] == $data1['nama_barang'])
                                                                                            echo 'selected="selected"';
                                                                                        ?>>
                                            <?= $data1['nama_barang'];
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" class="form-control" required>
                                        <option selected="selected"><?php echo $pecah[0]; ?></option>
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
						<option>$pecah[1]</option>";
                                    for ($a = 2012; $a <= $now; $a++) {
                                        echo "<option value='$a'>$a</option>";
                                    }
                                    echo "</select>";
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="d_aktual">Data Aktual Penggunaan Bahan(Set)</label>
                                <input class="form-control" type="text" name="d_aktual" placeholder="Masukkan Data Aktual Penggunaan Bahan" value="<?php echo $data['d_aktual']; ?>" required>
                            </div>


                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                            <a class="btn btn-secondary" href="data_aktual.php?peramalan">Kembali</a>

                        </form>
                    <?php } ?>

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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    </html>