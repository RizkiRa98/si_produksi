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
                <h1 class="h3 mb-0 text-gray-800">List Produk & Bahan Baku</h1>
            </div>
            <!-- Search -->
            <a href="tipeproduk_tambah.php" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Produk & Bahan Baku</a>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                <table class="mb-1">
                    <tr>
                        <td>
                            <div class="navbar-form navbar-left form-group" style="width: 300px;">
                                <input type="text" name="cari" class="form-control" placeholder="Masukkan  Lengkap Nama Barang" autocomplete="off">
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

                <table class="table table-bordered table-stripped table-hover">
                    <tr style="text-align: center;">
                        <!-- <th>No</th> -->
                        <!-- <th>ID Produk</th> -->
                        <th>Nama Barang</th>
                        <th>Nama Bahan</th>
                        <th>Quantity Bahan</th>
                        <th colspan="2">action</th>
                        <!-- <th colspan="3">Action</th> -->
                    </tr>
                    <!-- call data -->


                    <?php
                    include '../koneksi.php';
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data1 = mysqli_query($conf, "Select * from produk ");
                    $jumlah_data  = mysqli_num_rows($data1);
                    $total_halaman = ceil($jumlah_data / $batas);

                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $query = mysqli_query($conf, "SELECT produk.id_produk as id_produk, produk.id_barang as id_barang, barang.nama_barang as nama_barang, bahan.nama_bahan as nama_bahan, produk.qty as qty FROM produk
                        INNER JOIN barang ON produk.id_barang = barang.id_barang INNER JOIN bahan ON produk.id_bahan = bahan.id_bahan WHERE nama_barang LIKE '%" . $cari . "' ORDER by id_barang, nama_bahan asc LIMIT $halaman_awal, $batas");
                    } else {
                        $query = mysqli_query($conf, "SELECT produk.id_produk as id_produk, produk.id_barang as id_barang, barang.nama_barang as nama_barang, bahan.nama_bahan as nama_bahan, produk.qty as qty FROM produk
                        INNER JOIN barang ON produk.id_barang = barang.id_barang INNER JOIN bahan ON produk.id_bahan = bahan.id_bahan ORDER by id_barang, nama_bahan asc LIMIT $halaman_awal, $batas");
                    }
                    while ($data = mysqli_fetch_array($query)) {
                        // var_dump(count($data1));
                    ?>

                        <tr style="text-align: left;">
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['nama_bahan'] ?></td>
                            <td><?= $data['qty'] ?></td>
                            <td width="20px"><a href="tipeproduk_edit.php?id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> </td>
                            <td width="20px"><a href="../fungsi/hapusTipeproduk.php?id_produk=<?php echo $data['id_produk']; ?>" class=" btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>


                    <?php
                    }
                    ?>

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
<?php
require('../view/footer.php');
