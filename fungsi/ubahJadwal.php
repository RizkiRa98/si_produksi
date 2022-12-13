<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_penjadwalan = $_POST['id_penjadwalan'];
    $id_user = $_POST['id_user'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $nama_pelaksana = $_POST['nama_pelaksana'];
    $id_barang = $_POST['id_barang'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $query = mysqli_query($conf, "UPDATE penjadwalan set id_user = '$id_user', nama_konsumen = '$nama_konsumen', id_barang = '$id_barang', tgl_mulai = '$tgl_mulai', tgl_akhir = '$tgl_akhir' WHERE id_penjadwalan= '$id_penjadwalan'");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/penjadwalan_edit.php?penjadwalan\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Ubah'); location.href = \"../admin/penjadwalan.php?penjadwalan\"; </script>";
    }
}
