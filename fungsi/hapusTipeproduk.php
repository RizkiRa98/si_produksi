<?php
include '../koneksi.php';
$id_produk = $_GET['id_produk'];
$query = mysqli_query($conf, "DELETE FROM produk WHERE id_produk = '$id_produk'");
if (!$query) {
    echo "<script> alert('Data Tidak Berhasil Dihapus!'); location.href = \"../admin/tipeproduk.php?produk\"; </script>";
} else {
    echo "<script> alert('Data Berhasil Dihapus'); location.href = \"../admin/tipeproduk.php?produk\"; </script>";
}
