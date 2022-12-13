<?php
include '../koneksi.php';
require('../view/header.php');
require('../view/sidebar_pemimpin.php');

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

    @media (max-width: 1409px) {
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
            <h3 class="mr-2 d-none d-lg-inline text-dark font-weight-bold large">Selamat Datang Pemimpin</h3>
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Produksi</h1>
            </div>
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
                        <th hidden>ID Produksi</th>
                        <th>Nama Konsumen</th>
                        <th>Nama Ketua Grup</th>
                        <th>Nama Barang</th>
                        <th>Mulai Produksi</th>
                        <th>Akhir Produksi</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th width="300">Keterangan</th>
                        <th>Faktur</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <!-- call data -->
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data1 = mysqli_query($conf, "Select * from produksi");
                    $jumlah_data  = mysqli_num_rows($data1);
                    $total_halaman = ceil($jumlah_data / $batas);
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $query = mysqli_query($conf, "SELECT * FROM produksi INNER JOIN barang ON produksi.id_barang = barang.id_barang where nama_barang LIKE '%" . $cari . "%' OR nama_konsumen LIKE '%" . $cari . "%' OR nama_pelaksana LIKE '%" . $cari . "' OR status LIKE '%" . $cari . "%' OR tgl_mulai LIKE '%" . $cari . "%' OR catatan LIKE '%" . $cari . "%' ORDER BY tgl_mulai DESC LIMIT $halaman_awal, $batas");
                    } else {
                        $query = mysqli_query($conf, "SELECT * FROM produksi
                                                        INNER JOIN barang ON produksi.id_barang = barang.id_barang ORDER BY tgl_mulai DESC LIMIT $halaman_awal, $batas");
                    }
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr style="text-align: center ;">
                            <td width="20px"><?= $no++ ?></td>
                            <td hidden><?= $data['id_produksi'] ?></td>
                            <td><?= $data['nama_konsumen'] ?></td>
                            <td><?= $data['nama_pelaksana'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['tgl_mulai'] ?></td>
                            <td><?= $data['tgl_akhir'] ?></td>
                            <td <?php
                                include '../koneksi.php';
                                if (strtotime($data['tgl_selesai']) >= strtotime($data['tgl_akhir'])) {
                                    echo 'class="bg-danger text-white mt-1"';
                                } else {
                                    echo 'class="bg-success text-white mt-1"';
                                }
                                ?>><?= $data['tgl_selesai'] ?></td>
                            <td <?php
                                include '../koneksi.php';
                                if ($data['status'] == "Menunggu") {
                                    echo 'class="badge badge-pill badge-danger mt-2"';
                                } else if ($data['status'] == "Diproses") {
                                    echo 'class="badge badge-pill badge-warning mt-2"';
                                } else {
                                    echo 'class="badge badge-pill badge-success mt-2"';
                                }
                                ?>><?= $data['status'] ?></td>
                            <td><?= $data['catatan'] ?></td>
                            <td width="20px"><a href="faktur_detail_pemimpin.php?id_produksi=<?php echo $data['id_produksi']; ?>" class="btn btn-sm btn-info"><i class="fa fa-paperclip"></i></a></td>
                            <td width="20px"><a href="produksi_detail_pemimpin.php?id_produksi=<?php echo $data['id_produksi']; ?>" class="btn btn-sm btn-success"><i class="fa fa-search-plus"></i></a></td>
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
