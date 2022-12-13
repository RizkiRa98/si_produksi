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
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">List Pengguna Sistem Informasi</h1>
            </div>
            <!-- Search -->
            <a href="pengguna_tambah.php" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Pengguna</a>

            <!-- Table Isi -->

            <table class="table table-bordered table-stripped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th colspan="2">Action</th>
                </tr>
                <!-- call data -->
                <?php
                include '../koneksi.php';
                $no = 1;
                $query = mysqli_query($conf, 'SELECT * FROM user');
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr style="text-align: center ;">
                        <td width="20px"><?= $no++ ?></td>
                        <td><?= $data['nama_user'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <!-- update -->
                        <td width="20px"><a href="pengguna_edit.php?id_user=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <!-- delete -->
                        <td width="20px"><a href="../fungsi/hapusPengguna.php?id_user=<?php echo $data['id_user']; ?>" onclick="return confirm('Hapus data ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

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
