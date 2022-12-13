<?php
include '../koneksi.php';
$id_barang = $_GET['id_barang'];
$query = mysqli_query($conf, "DELETE FROM barang WHERE id_barang = '$id_barang'");
if (!$query) {
    echo "<script> alert('Data Tidak Berhasil Dihapus!'); location.href = \"../admin/barang.php?barang\"; </script>";
} else {
    echo "<script> alert('Data Berhasil Dihapus'); location.href = \"../admin/barang.php?barang\"; </script>";
}
