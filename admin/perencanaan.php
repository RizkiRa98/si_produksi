<?php
include '../koneksi.php';
require('../view/header.php');
require('../view/sidebar.php');
?>
<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead tr td {
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 0.35px;
        opacity: 1;
        padding: 12px;
        vertical-align: top;
    }

    .table tbody tr td {
        font-size: 14px;
        letter-spacing: 0.35px;
        font-weight: normal;
        padding: 8px;
    }

    .table tbody tr td .btn {
        text-decoration: none;
        line-height: 25px;
        display: inline-block;
        vertical-align: middle;
    }

    select {
        margin-top: 4px;
        padding: 1.5rem;
        border-radius: 4px;
        background-color: white;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        font-size: 1.6rem;
        cursor: pointer;
    }

    select.form-control {
        -webkit-appearance: menulist;
    }

    @media (max-width: 936px) {
        .table thead {
            display: none;
        }

        .table .table tbody,
        .table tr,
        .table td {
            display: block;
            width: 100%;
        }

        .table tr {
            margin-bottom: 15px;
        }

        .table tbody tr td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: 600;
            font-size: 14px;
            text-align: left;
        }

    }
</style>
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
                <h1 class="h3 mb-0 text-gray-800">Perencanaan Bahan</h1>
            </div>
            <!-- Search -->
            <a href="perencanaan_tambah.php" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Perencanaan</a>
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
                        <th>ID Perencanaan</th>
                        <th>Nama Konsumen</th>
                        <th>Nama Pelaksana</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Order</th>
                        <th style="text-align: center;">Tambah List Bahan</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <!-- Call Data -->
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data1 = mysqli_query($conf, "Select * from perencanaan");
                    $jumlah_data  = mysqli_num_rows($data1);
                    $total_halaman = ceil($jumlah_data / $batas);

                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $query = mysqli_query($conf, "SELECT * FROM perencanaan INNER JOIN barang ON perencanaan.id_barang = barang.id_barang where nama_barang LIKE '%" . $cari . "' OR tgl_order LIKE '%" . $cari . "' OR nama_konsumen LIKE '%" . $cari . "' OR nama_pelaksana LIKE '%" . $cari . "' ORDER BY tgl_order desc LIMIT $halaman_awal, $batas  ");
                    } else {
                        $query = mysqli_query($conf, "SELECT * FROM perencanaan
                                                        INNER JOIN barang ON perencanaan.id_barang = barang.id_barang ORDER BY tgl_order desc LIMIT $halaman_awal, $batas ");
                    }
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>

                        <tr style="text-align: center ;">
                            <td width="20px"><?= $no++ ?></td>
                            <td><?= $data['id_perencanaan'] ?></td>
                            <td><?= $data['nama_konsumen'] ?></td>
                            <td><?= $data['nama_pelaksana'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['tgl_order'] ?></td>
                            <td hidden><?= $data['list_bahan'] ?></td>
                            <td><a href="perencanaan_bahan.php?id_perencanaan=<?php echo $data['id_perencanaan']; ?>" class="btn btn-sm btn-warning">Tambah List Bahan</a></td>

                            <!-- Detail List Bahan Modal -->
                            <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalList<?php echo $data['id_perencanaan']; ?>">
                                    Cek List
                                </button>
                                <div class="modal fade" id="modalList<?php echo $data['id_perencanaan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalListLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning">
                                                <h5 class="modal-title fw-bold text-dark" id="modalListLabel">List Detail Bahan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <table class="table table-striped table-hover table-bordered w-100">
                                                    <tr>
                                                        <td class="w-50" hidden>ID Perencanaan</td>
                                                        <td class="text-left" id="id_perencanaan" name="id_perencanaan" hidden><?php echo $data['id_perencanaan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Nama Barang</td>
                                                        <td class="text-left" id="nama_barang" name="nama_barang"><?php echo $data['nama_barang']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Quantity Bahan (Set)</td>
                                                        <td class="text-left" id="qty" name="qty"><?php echo $data['qty']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 1</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty1'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 2</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty2'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 3</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty3'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 4</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty4'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 5</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty5'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 6</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty6'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 7</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty7'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 8</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty8'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 9</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty9'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 10</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty10'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 11</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty11'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 12</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty12'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 13</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty13'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 14</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty14'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 15</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty15'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 16</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty16'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 17</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty17'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 18</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty18'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 19</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty19'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 20</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty20'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 21</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty21'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 22</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty22'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 23</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty23'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 24</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty24'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 25</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty25'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 26</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty26'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 27</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty27'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 28</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty28'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 29</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty29'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-50">Bahan 30</td>
                                                        <td class="text-left"><?php echo $data['bhn_qty30'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <!-- End Detail List Bahan Modal -->

                            <td width="20px"><a href="perencanaan_detail.php?id_perencanaan=<?php echo $data['id_perencanaan']; ?>" class="btn btn-sm btn-success"><i class="fa fa-search-plus"></i></a>
                            <td width="20px"><a href="perencanaan_edit.php?id_perencanaan=<?php echo $data['id_perencanaan']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <!-- <td width="20px"><a href="../fungsi/hapusPerencanaan.php?id_perencanaan=<?php echo $data['id_perencanaan']; ?>" class=" btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')"><i class="fa fa-trash"></i></a>
                            </td> -->
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


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">Ready to Leave?</h5>
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

?>