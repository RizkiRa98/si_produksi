<?php
include '../koneksi.php';
$id_perencanaan = $_GET['id_perencanaan'];
$query = mysqli_query($conf, "SELECT * FROM perencanaan WHERE id_perencanaan='$id_perencanaan'");
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
        <title>Ubah Perencanaan</title>
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
                        <i class="fas fa-fw fa-fa-sticky-note"></i>
                        <span>Perencanaan</span></a>
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
                            <h1 class="h3 mb-0 text-gray-800">Ubah Perencanaan</h1>
                        </div>

                        <!-- Form Tambah -->
                        <!-- <?php
                                include '../koneksi.php';
                                $query1 = "SELECT * from perencanaan where id_perencanaan = '$id_perencanaan'";
                                $resultquery = mysqli_query($conf, $query1);

                                $data1 = mysqli_fetch_assoc($resultquery);

                                $bulan_tahun = $data1['bulan_tahun'];
                                $pecah = explode(" ", $bulan_tahun);
                                $bulan = $pecah[0];
                                $tahun = $pecah[1];
                                ?> -->

                        <form action="../fungsi/ubahPerencanaan.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="id_perencanaan">ID Perencanaan</label>
                                <input type="text" name="id_perencanaan" id="id_perencanaan" class="form-control" placeholder="Masukkan ID Perencanaan" value="<?php echo $data['id_perencanaan'] ?>" readonly>
                            </div>

                            <div class="form-group" hidden>
                                <label for="id_user">ID Pengguna</label>
                                <input type="text" name="id_user" id="id_user" class="form-control" placeholder="Masukkan ID Perencanaan" value="<?php echo $data['id_user'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama_konsumen">Nama Konsumen</label>
                                <input type="text" name="nama_konsumen" id="nama_konsumen" class="form-control" placeholder="Masukkan Nama Konsumen" autocomplete="off" value="<?php echo $data['nama_konsumen'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="nama_pelaksana">Nama Ketua Grup</label>
                                <input type="text" name="nama_pelaksana" id="nama_pelaksana" class="form-control" placeholder="Masukkan Nama Pelaksana" value="<?php echo $data['nama_pelaksana'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <select name="id_barang" class="form-control">
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT * FROM barang");
                                    while ($data1 = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $data1['id_barang']; ?>" <?php if ($data['id_barang'] == $data1['id_barang'])
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
                            <div class="form-group">
                                <label for="tgl_order">Tanggal Order</label>
                                <input type="date" name="tgl_order" id="tgl_order" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['tgl_order'] ?>">
                            </div>

                            <!-- <div class="row">
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
                            </div> -->
                            <div class="form-group">
                                <label for="bhn_qty1">Bahan 1</label>
                                <input type="text" name="bhn_qty1" id="bhn_qty1" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty1'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty2">Bahan 2</label>
                                <input type="text" name="bhn_qty2" id="bhn_qty2" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty2'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty3">Bahan 3</label>
                                <input type="text" name="bhn_qty3" id="bhn_qty3" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty3'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty4">Bahan 4</label>
                                <input type="text" name="bhn_qty4" id="bhn_qty4" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty4'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty5">Bahan 5</label>
                                <input type="text" name="bhn_qty5" id="bhn_qty5" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty5'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty6">Bahan 6</label>
                                <input type="text" name="bhn_qty6" id="bhn_qty6" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty6'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty7">Bahan 7</label>
                                <input type="text" name="bhn_qty7" id="bhn_qty7" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty7'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty8">Bahan 8</label>
                                <input type="text" name="bhn_qty8" id="bhn_qty8" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty8'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty9">Bahan 9</label>
                                <input type="text" name="bhn_qty9" id="bhn_qty9" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty9'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty10">Bahan 10</label>
                                <input type="text" name="bhn_qty10" id="bhn_qty10" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty10'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty11">Bahan 11</label>
                                <input type="text" name="bhn_qty11" id="bhn_qty11" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty11'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty12">Bahan 12</label>
                                <input type="text" name="bhn_qty12" id="bhn_qty12" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty12'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty13">Bahan 13</label>
                                <input type="text" name="bhn_qty13" id="bhn_qty13" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty13'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty14">Bahan 14</label>
                                <input type="text" name="bhn_qty14" id="bhn_qty14" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty14'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty15">Bahan 15</label>
                                <input type="text" name="bhn_qty15" id="bhn_qty15" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty15'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty16">Bahan 16</label>
                                <input type="text" name="bhn_qty16" id="bhn_qty16" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty16'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty17">Bahan 17</label>
                                <input type="text" name="bhn_qty17" id="bhn_qty17" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty17'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty18">Bahan 18</label>
                                <input type="text" name="bhn_qty18" id="bhn_qty18" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty18'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty19">Bahan 19</label>
                                <input type="text" name="bhn_qty19" id="bhn_qty19" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty19'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty20">Bahan 20</label>
                                <input type="text" name="bhn_qty20" id="bhn_qty20" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty20'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty21">Bahan 21</label>
                                <input type="text" name="bhn_qty21" id="bhn_qty21" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty21'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty22">Bahan 22</label>
                                <input type="text" name="bhn_qty22" id="bhn_qty22" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty22'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty23">Bahan 23</label>
                                <input type="text" name="bhn_qty23" id="bhn_qty23" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty23'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty24">Bahan 24</label>
                                <input type="text" name="bhn_qty24" id="bhn_qty24" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty24'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty25">Bahan 25</label>
                                <input type="text" name="bhn_qty25" id="bhn_qty25" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty25'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty26">Bahan 26</label>
                                <input type="text" name="bhn_qty26" id="bhn_qty26" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty26'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty27">Bahan 27</label>
                                <input type="text" name="bhn_qty27" id="bhn_qty27" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty27'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty28">Bahan 28</label>
                                <input type="text" name="bhn_qty28" id="bhn_qty28" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty28'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty29">Bahan 29</label>
                                <input type="text" name="bhn_qty29" id="bhn_qty29" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty29'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="bhn_qty30">Bahan 30</label>
                                <input type="text" name="bhn_qty30" id="bhn_qty30" class="form-control" placeholder="" style="width: 30%;" value="<?php echo $data['bhn_qty30'] ?>">
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                            <a class="btn btn-secondary" href="perencanaan.php?perencanaan">Kembali</a>

                        </form>
                    <?php } ?>


                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
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