<?php
include '../koneksi.php';
$id_produksi = $_GET['id_produksi'];
$query = mysqli_query($conf, "DELETE FROM faktur WHERE id_produksi = '$id_produksi'");
if (!$query) {
    echo "<script> alert('Data Tidak Berhasil Dihapus!'); location.href = \"../admin/produksi.php?produksi\"; </script>";
} else {
    echo "<script> alert('Data Berhasil Dihapus'); location.href = \"../admin/produksi.php?produksi\"; </script>";
}
