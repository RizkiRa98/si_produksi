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

    <title>Tambah Perencanaan Bahan</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
        .add_more input {
            width: 50%;
            margin-right: 500px;
        }

        .add_more select {
            width: 50%;
        }
    </style>
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
                    <i class="fas fa-fw fa-couch"></i>
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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Perencanaan Bahan</h1>
                    </div>
                    <!-- Form Tambah -->
                    <form action="../fungsi/tambahPerencanaanBahan.php" enctype="multipart/form-data" method="POST">
                        <?php
                        include '../koneksi.php';
                        $id_perencanaan = $_GET['id_perencanaan'];
                        $query = mysqli_query($conf, "SELECT * FROM perencanaan WHERE id_perencanaan='$id_perencanaan'");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <div class="form-group">
                                <label for="id_perencanaan">ID Perencanaan</label>
                                <input type="text" name="id_perencanaan" id="id_perencanaan" class="form-control" placeholder="Masukkan ID Produksi" value="<?php echo $data['id_perencanaan'] ?>" readonly>
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
                                <label for="id_barang">Nama Barang </label>

                                <div class="form-group">
                                    <input type="text" name="id_barang" id="id_barang" class="form-control" placeholder="Masukkan Catatan" <?php
                                                                                                                                            $id_barang = $data['id_barang'];
                                                                                                                                            include '../koneksi.php';
                                                                                                                                            $query1 = mysqli_query($conf, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
                                                                                                                                            while ($data1 = mysqli_fetch_array($query1)) {
                                                                                                                                            ?> value="<?php echo $data1['id_barang'] ?>" readonly hidden> <?php } ?>
                                <input type="text" name="nama_barang" id="id_barang" class="form-control" placeholder="Masukkan Nama Barang" <?php
                                                                                                                                                $id_barang = $data['id_barang'];
                                                                                                                                                include '../koneksi.php';
                                                                                                                                                $query1 = mysqli_query($conf, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
                                                                                                                                                while ($data1 = mysqli_fetch_array($query1)) {
                                                                                                                                                ?> value="<?php echo $data1['nama_barang'] ?>" readonly>
                            <?php } ?>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col">
                                    <label for="tgl_order">Tanggal Order</label>
                                    <input type="text" name="tgl_order" id="tgl_order" class="form-control" placeholder="Masukkan ID Produksi" value="<?php echo $data['tgl_order'] ?>" readonly>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Isi bahan baku -->
                        <div id="add_more" class="add_more">
                            <div class="row" id="row">
                                <div class="form-group col">
                                    <label style="color: red;"><b>*Jika Bahan Tidak Muncul Tambahkan Terlebih Dahulu Jenis Barang dan Bahan Di Menu Produk*</b></label><br>
                                    <?php
                                    include '../koneksi.php';

                                    $sql = mysqli_query($conf, "SELECT bahan.nama_bahan, produk.id_bahan, produk.qty FROM produk INNER JOIN bahan ON produk.id_bahan = bahan.id_bahan WHERE id_barang = $id_barang");
                                    $x = 1;
                                    $i = 1;
                                    $counter = 1;
                                    while ($data2 = mysqli_fetch_array($sql)) {
                                    ?>
                                        <label for="bhn_qty" class="mt-1"><b>Bahan & Quantity <?= $x++ ?></b></label>
                                        <input type="text" name="bhn_qty<?= $i++ ?>" id="bhn_qty" class="form-control" placeholder="Masukkan bahan & quantity" style="width: 100%;" value="<?= $data2['nama_bahan'] . " - " . $data2['qty']; ?>">
                                    <?php $counter++;
                                    }
                                    $_SESSION['counter'] = $counter; ?>
                                    <div class="form-group" hidden>
                                        <label for="tambah"></label>
                                        <input type="text" name="tambah" id="tambah" class="form-control" placeholder="" value="<?php echo $counter ?>" readonly>
                                    </div>

                                </div>
                                <!-- <div class="col" style="margin-top: 30px;"><a href="#" class="btn btn-success add_item_btn" id="add">Tambah</a></div> -->
                            </div>
                        </div>


                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                        <a class="btn btn-secondary" href="perencanaan.php?perencanaan">Kembali</a>

                    </form>


                    <!-- <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                        <a class="btn btn-secondary" href="produksi.php?produksi">Kembali</a> -->

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
            //Variable


            var selectedRow = (document.getElementById("tambah").value) - 1;
            var maxRows = 30 - selectedRow;
            var y = document.getElementById("tambah").value;
            var x = 0;
            //Add rows ke form
            $("#add").click(function(e) {
                if (x < maxRows) {
                    x++;
                    y++;
                    document.getElementById("tambah").value = y;
                    var html = '<div class="row" id="row"><div class="form-group col"><?php $i = $i + 1; ?><label for="qty">Bahan & Quantity</label><input type="text" name="bhn_qty<?= $i ?>" id="qty" class="form-control" placeholder="Masukkan bahan & quantity" style="width: 100%;" value=""></div><div class="col" style="margin-top: 30px;"><a href="#" class="btn btn-danger add_item_btn" id="remove">Hapus</a></div></div> ';

                    $("#add_more").append(html);


                }

            });
            //Remove rows dari form
            $("#add_more").on('click', '#remove', function(e) {
                $(this).closest("#row").remove();
                x--;
                y--;
                document.getElementById("tambah").value = y;
            });

        });
    </script>
</body>


</html>