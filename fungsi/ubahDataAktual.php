<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_peramalan = $_POST['id_peramalan'];
    $id_user = $_POST['id_user'];
    $id_alpha = $_POST['id_alpha'];
    $nama_barang = $_POST['nama_barang'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $bln_thn = $bulan . " " . $tahun;
    $d_aktual = $_POST['d_aktual'];


    $query = mysqli_query($conf, "UPDATE peramalan set id_user = '$id_user',  id_alpha = '$id_alpha', nama_barang = '$nama_barang', bln_thn = '$bln_thn', d_aktual = '$d_aktual' WHERE id_peramalan= '$id_peramalan'");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/dataAktual_edit.php?produksi\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Diubah'); location.href = \"../admin/data_aktual.php?produksi\"; </script>";
    }
}
