<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $periode = $_POST['periode'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $data_aktual = $_POST['data_aktual'];
    $data_peramalan = $_POST['data_peramalan'];

    $query = mysqli_query($conf, "INSERT INTO peramalan ( periode, bulan, tahun, data_aktual, data_peramalan) VALUES ('$periode', '$bulan', '$tahun', '$data_aktual', '$data_peramalan')");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/peramalan.php?peramalan\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/peramalan.php?peramalan\"; </script>";
    }
}
