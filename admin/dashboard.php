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
                <h1 class="h3 mb-0 text-gray-800">Dashboard Sistem Informasi Produksi CV.Renosaf Mebeul</h1>
            </div>
            <div class="row">

                <!-- Status Selesai  -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Produksi Selesai</div>
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT status, COUNT(status) FROM `produksi` WHERE status = 'selesai' GROUP BY status");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $data['COUNT(status)']; ?>
                                        <?php  } ?>
                                        </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Diproses -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Produksi Diproses </div>
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT status, COUNT(status) FROM `produksi` WHERE status = 'diproses' GROUP BY status");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $data['COUNT(status)']; ?>
                                        <?php  } ?>
                                        </div>
                                </div>
                                <div class="col-right">
                                    <i class="fas fa-spinner fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status Menunggu -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Produksi Menunggu </div>
                                    <?php
                                    include '../koneksi.php';
                                    $query = mysqli_query($conf, "SELECT status, COUNT(status) FROM `produksi` WHERE status = 'menunggu' GROUP BY status");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $data['COUNT(status)']; ?>
                                        <?php  } ?>
                                        </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- chart produksi -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Chart Produksi</h1>
            </div>

            <div class="t">
                <canvas id="myChart" style="width: 300x; height: 300px;"></canvas>
            </div>
            <script src="../js/chart.min.js"></script>
            <script>
                const data = {
                    labels: [
                        'Belum Ada Catatan',
                        'Bahan Kurang',
                        'Bahan Diganti',
                        'Bahan Lebih',
                        'Bahan Cukup',
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [<?php
                                $menunggu = mysqli_query($conf, "SELECT catatan FROM `produksi` WHERE catatan LIKE '%belum%' ");
                                echo mysqli_num_rows($menunggu);
                                ?>, <?php
                                    $diproses = mysqli_query($conf, "SELECT catatan FROM `produksi` WHERE catatan LIKE '%kurang%' ");
                                    echo mysqli_num_rows($diproses);
                                    ?>, <?php
                                        $selesai = mysqli_query($conf, "SELECT catatan FROM `produksi` WHERE catatan LIKE '%diganti%' ");
                                        echo mysqli_num_rows($selesai);
                                        ?>, <?php
                                            $selesai = mysqli_query($conf, "SELECT catatan FROM `produksi` WHERE catatan LIKE '%lebih%' ");
                                            echo mysqli_num_rows($selesai);
                                            ?>, <?php
                                                $selesai = mysqli_query($conf, "SELECT catatan FROM `produksi` WHERE catatan LIKE '%cukup%' ");
                                                echo mysqli_num_rows($selesai);
                                                ?>],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(51, 204, 51)',
                            'rgb(191, 191, 191)'
                        ],
                        hoverOffset: 4
                    }]
                };
                const config = {
                    type: 'doughnut',
                    data: data,
                    options: {}
                };
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            </script>

        </div>
    </div>

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
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <?php
    require('../view/footer.php');
    ?>