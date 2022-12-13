<?php
include '../koneksi.php';
require('../view/header.php');
require('../view/sidebar.php');
?>


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
                <h1 class="h3 mb-0 text-gray-800">Penjadwalan Produksi</h1>
            </div>

            <a href="penjadwalan_tambah.php" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Penjadwalan</a>
            <!-- Search -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                <table class="mb-1">
                    <tr>
                        <td>
                            <div class="navbar-form navbar-left form-group" style="width: 200px;">
                                <input type="text" name="cari" class="form-control" placeholder="Search" autocomplete="off">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Cari"></input>
                            </div>
                    </tr>
                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        echo "Hasil Cari : " . $cari . "<br>";
                    }
                    ?>
                </table>
            </form>
            <!-- Table Isi -->

            <table class="table table-bordered table-stripped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penjadwalan</th>
                        <th>Nama Konsumen</th>
                        <th>Nama Ketua Grup</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';

                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data1 = mysqli_query($conf, "Select * from penjadwalan");
                    $jumlah_data  = mysqli_num_rows($data1);
                    $total_halaman = ceil($jumlah_data / $batas);

                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $query = mysqli_query($conf, "SELECT * FROM penjadwalan INNER JOIN barang ON penjadwalan.id_barang = barang.id_barang where nama_konsumen LIKE '%" . $cari . "' OR nama_pelaksana LIKE '%" . $cari . "' OR tgl_mulai LIKE '%" . $cari . "' OR tgl_akhir LIKE '%" . $cari . "' ORDER BY tgl_akhir ASC LIMIT $halaman_awal, $batas");
                    } else {
                        $query = mysqli_query($conf, "SELECT * FROM penjadwalan
                                                        INNER JOIN barang ON penjadwalan.id_barang = barang.id_barang ORDER BY tgl_akhir ASC LIMIT $halaman_awal, $batas");
                    }
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr style="text-align: center ;">
                            <td width="20px"><?= $no++ ?></td>
                            <td><?= $data['id_penjadwalan'] ?></td>
                            <td><?= $data['nama_konsumen'] ?></td>
                            <td><?= $data['nama_pelaksana'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['tgl_mulai'] ?></td>
                            <td><?= $data['tgl_akhir'] ?></td>
                            <td width="20px"><a href="penjadwalan_detail.php?id_penjadwalan=<?php echo $data['id_penjadwalan']; ?>" class="btn btn-sm btn-success"><i class="fa fa-search-plus"></i></a>
                            <td width="20px"><a href="penjadwalan_edit.php?id_penjadwalan=<?php echo $data['id_penjadwalan']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href='?halaman=$previous'";
                                                } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>

                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href='?halaman=$next'";
                                                } ?>>Next</a>
                    </li>
                </ul>
            </nav>
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

<?php
require('../view/footer.php');
