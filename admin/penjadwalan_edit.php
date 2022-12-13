<?php
include '../koneksi.php';
$id_penjadwalan = $_GET['id_penjadwalan'];
$query = mysqli_query($conf, "SELECT * FROM penjadwalan WHERE id_penjadwalan='$id_penjadwalan'");
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

        <title>Ubah Penjadwalan</title>

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
                    <a class="nav-link" href="penjadwalan.php?penjadwalan">
                        <i class="fas fa-fw fa-calendar-day"></i>
                        <span>Penjadwalan</span></a>
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
                            <h1 class="h3 mb-0 text-gray-800">Ubah Penjadwalan</h1>
                        </div>

                        <!-- Form Tambah -->
                        <form action="../fungsi/ubahJadwal.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group" hidden>
                                <label>ID Penjadwalan</label>
                                <input type="text" name="id_penjadwalan" id="id_pejadwalan" class="form-control" value="<?= $data['id_penjadwalan']; ?>" readonly>
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
                                    <option value="">-- Pilih Nama Barang--</option>
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT * FROM barang");
                                    while ($data1 = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?= $data1['id_barang']; ?>" <?php if ($data['id_barang'] == $data1['id_barang']) echo 'selected="selected"'; ?>>
                                            <?= $data1['nama_barang']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tgl_mulai">Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" style="width: 30%;" value="<?php echo $data['tgl_mulai'] ?>">
                            </div>

                            <!-- <div class="form-group">
                                <label>Jumlah Hari</label>
                                <input type="input" name="jml_hari" id="jml_hari" class="form-control" style="width: 30%;" onkeyup="jumlah();">
                            </div> -->

                            <div class="form-group">
                                <label for="tgl_akhir">Tanggal Selesai</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" style="width: 30%;" value="<?php echo $data['tgl_akhir'] ?>">
                            </div>


                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

                            <a class="btn btn-secondary" href="penjadwalan.php?penjadwalan">Kembali</a>

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

    <script type="text/JavaScript">
        function jumlah() {
        var tm = document.getElementById('tgl_mulai').value;
        var jh = document.getElementById('jml_hari').value;
        var hari = jh*24*60*60*1000;

        var deadline = new Date(new Date(tm).getTime()+(hari));

        document.getElementById('tgl_akhir').value = deadline.toISOString().slice(0 , 10);
    }
</script>