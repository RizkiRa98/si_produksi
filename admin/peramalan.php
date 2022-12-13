<?php
include_once("../koneksi.php");
require('../view/header.php');
require('../view/sidebar.php');

$querytampil = "SELECT * from peramalan";
$queryalpha = "SELECT * from alpha where id_alpha = 'A1'";
$querysum = "SELECT sum(d_aktual) from peramalan";

if (isset($_GET['pesan_sukses'])) {
    $pesan_sukses = $_GET['pesan_sukses'];
}

if (isset($_POST["submit"])) {
    if ($_POST["submit"] = "Ganti Alpha") {
        $id_alpha = $_POST['id_alpha'];
        $n_alpha = $_POST['nilai_alpha'];

        $pesan_error = "";

        if (empty($n_alpha)) {
            $pesan_error = "Nilai alpha belum di isi!";
        }
        if (($pesan_error === "") and ($_POST["submit"] = "Ganti Alpha")) {
            $id_alpha = mysqli_real_escape_string($conf, $id_alpha);
            $n_alpha = mysqli_real_escape_string($conf, $n_alpha);

            $queryupdatealpha = "UPDATE alpha set nilai_alpha = '$n_alpha' WHERE id_alpha = '$id_alpha'";

            $resultquery = mysqli_query($conf, $queryupdatealpha);

            if ($resultquery) {
                $pesan_sukses = "Alpha berhasil diupdate!<br>";
                $pesan_sukses = urlencode($pesan_sukses);
                header("Location: ../admin/peramalan.php?pesan_sukses=($pesan_sukses)");
            } else {
                die("Query gagal dijalankan: " . mysqli_errno($conf) . " - " . mysqli_error($conf));
            }

            mysqli_free_result($resultquery);
        }
    }
}
?>
<script src="../js/chart.min.js"></script>
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
                <h1 class="h3 mb-0 text-gray-800">Peramalan Bahan Baku</h1>
            </div>
            <a href="peramalan_tambah.php" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data Aktual</a>

            <a href="data_aktual.php" class="btn btn-sm btn-success mb-3 ml-3"><i class="fas fa-edit fa-sm"></i> Olah Data Aktual</a>
            <!-- Nilai Alpha -->
            <div style="margin-bottom: 10px;">
                <?php
                // if ($pesan_error !== "") {
                //     echo "<div class='alert alert-danger alert-dismissible'>
                // 		<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                // 		<strong >Gagal!</strong> " . $pesan_error .
                //         "</div>";
                // }

                // if (isset($pesan_sukses)) {
                //     echo "<div class='alert alert-success alert-dismissible'>
                // 		<a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                // 		<strong>Berhasil!</strong> " . $pesan_sukses .
                //         "</div>";
                // }

                $resultquery = mysqli_query($conf, $queryalpha);

                if (!$resultquery) {
                    die("Query Error : " . mysqli_errno($conf) . " - " . mysqli_error($conf));
                }

                $data_alpha = mysqli_fetch_assoc($resultquery);
                ?>
                <div class="row">
                    <div class="col-sm-4">
                        <h6 class="alert alert-info">Nilai alpha saat ini adalah : <b><?php echo $data_alpha['nilai_alpha']; ?></b></h6>
                    </div>
                    <!-- <div class="col-sm-8">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" name="ubah_alpha">
                            <div class="form-check form-check-inline">
                                <input class="form-control" type="text" name="nilai_alpha" placeholder="Ganti Nilai Alpha" style="width:400px;">
                                <input type="hidden" name="id_alpha" value="<?php echo $data_alpha['id_alpha']; ?>">
                                <input class="btn btn-primary" type="submit" name="submit" value="Ganti Alpha" style="margin-left:10px;">
                            </div>
                        </form>
                    </div> -->
                </div>
                <?php
                $id_alpha = $data_alpha["id_alpha"];
                $n_alpha = $data_alpha["nilai_alpha"];


                ?>
                <!-- Tampilan utama -->
                <div class="row">
                    <div class="col-sm-9">
                        <table class="table table-bordered table-hover">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data" method="POST">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Bulan & Tahun</th>
                                        <th>Data Aktual Penggunaan Bahan(Set)</th>
                                        <th>Data Peramalan</th>
                                        <!-- <th>Error</th>
                                    <th>Abs Error</th>
                                    <th>Abs Error^2</th> -->
                                        <!-- <th>Abs Error %</th> -->

                                    </tr>
                                </thead>
                                <!-- Menentukan nilai peramalan pertama -->
                                <?php
                                $resultquery = mysqli_query($conf, $querysum);
                                $hasilsum = mysqli_fetch_row($resultquery);

                                $resultquery = mysqli_query($conf, $querytampil);
                                $d_perkiraan = "";
                                $count = mysqli_num_rows($resultquery);
                                $loop = 0;
                                $sum_abs_err = 0;
                                $sum_abs_err2 = 0;
                                $sum_abs_persent = 0;

                                while ($row = mysqli_fetch_row($resultquery)) {
                                    // Data peramalan pertama
                                    if ($d_perkiraan === "") {
                                        $d_perkiraan = $row[5];
                                    } else {
                                        $d_perkiraan = $h_perkiraan;
                                    }
                                    $array_perkiraan[] = $d_perkiraan;
                                    // rumus error
                                    $error = $row[5] - $d_perkiraan;
                                    // rumus absolute error
                                    $abs_err = abs($error);
                                    $sum_abs_err = $sum_abs_err + $abs_err;
                                    // rumus absolute error pangkat 2
                                    $abs_err2 = pow($error, 2);
                                    $sum_abs_err2 = $sum_abs_err2 + $abs_err2;
                                    // rumus absolute error %
                                    // $abs_err_percent = abs((($row[3] - $d_perkiraan) / $row[3]) * 100);
                                    // $sum_abs_err_percent = $sum_abs_err_percent + $abs_err_percent;
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>$row[3]</td>
								<td>$row[4]</td>
                                <td style=text-align:center;>$row[5] Set</td>
								<td style=text-align:center;>" . number_format($d_perkiraan, 2) . "</td>

								";

                                    echo "</tr>";
                                    echo "</tbody>";
                                    // rumus single exponential smoothing
                                    $h_perkiraan = $d_perkiraan + $n_alpha * ($row[5] - $d_perkiraan);
                                    // melakukan peramalan untuk bulan selanjutnya
                                    $loop = $loop + 1;
                                    if ($loop == $count) {
                                        echo "</table></div>";
                                        $d_aktual_next = $row[5];
                                        $d_perkiraan_next = $d_perkiraan;
                                        $d_ft = $d_perkiraan_next + $n_alpha * ($d_aktual_next - $d_perkiraan_next);
                                ?>
                                        <h4 class="alert alert-info">Perkiraan untuk bulan berikutnya adalah <?php echo number_format($d_ft, 2); ?> = <?php echo number_format(round($d_ft, 2)); ?> Set</h4>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                    </div>
                </div>
                <!-- Chart Peramalan -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Grafik Peramalan</h1>
                </div>
                <!-- Grafik -->

                <div class="t">
                    <canvas id="speedChart"></canvas>
                </div>
                <script>
                    var speedCanvas = document.getElementById("speedChart");

                    Chart.defaults.global.defaultFontFamily = "Times New Roman";
                    Chart.defaults.global.defaultFontSize = 12;

                    var dataFirst = {
                        label: "Aktual",
                        data: [<?php
                                $querydaktual = "select d_aktual from peramalan";
                                $resultquery = mysqli_query($conf, $querydaktual);

                                if (!$resultquery) {
                                    die("Query Error : " . mysqli_errno($conf) . " - " . mysqli_error($conf));
                                }

                                while ($data_aktual = mysqli_fetch_assoc($resultquery)) {
                                    echo "$data_aktual[d_aktual], ";
                                }
                                ?>],

                        lineTension: 0.3,
                        fill: false,
                        borderColor: '#FFD662',
                        backgroundColor: '#FFD662',
                        pointBorderColor: '#FFD662',
                        pointBackgroundColor: '#FFD662',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointHitRadius: 15,
                        pointBorderWidth: 2,
                        pointStyle: 'rect'
                    };

                    var dataSecond = {
                        label: "Perkiraan",
                        data: [<?php
                                foreach ($array_perkiraan as $arper) {
                                    echo "" . $arper . ", ";
                                }
                                echo "" . $d_ft . "";
                                ?>],

                        lineTension: 0.3,
                        fill: false,
                        borderColor: '#007bff',
                        backgroundColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointHitRadius: 15,
                        pointBorderWidth: 2
                    };

                    var speedData = {
                        labels: [<?php
                                    $querybulan = "select bln_thn from peramalan";
                                    $resultquery = mysqli_query($conf, $querybulan);

                                    if (!$resultquery) {
                                        die("Query Error : " . mysqli_errno($conf) . " - " . mysqli_error($conf));
                                    }

                                    while ($data_bulan = mysqli_fetch_assoc($resultquery)) {
                                        echo "\"$data_bulan[bln_thn]\", ";
                                    }
                                    echo "\"Bulan berikutnya\"";
                                    ?>],
                        //labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
                        datasets: [dataFirst, dataSecond]
                    };

                    var chartOptions = {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 50,
                                fontColor: 'black'
                            }
                        }
                    };

                    var lineChart = new Chart(speedCanvas, {
                        type: 'line',
                        data: speedData,
                        options: chartOptions
                    });
                </script>
                <?php
                mysqli_free_result($resultquery);
                mysqli_close($conf);
                ?>

            </div>

        </div>

    </div>
</div>
<!-- End of Main Content -->


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
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<?php

require('../view/footer.php');

?>