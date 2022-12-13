<?php
include '../koneksi.php';
$id_peramalan = $_GET['id_peramalan'];
$query = mysqli_query($conf, "DELETE FROM peramalan WHERE id_peramalan = '$id_peramalan'");
if (!$query) {
    echo "<script> alert('Data Tidak Berhasil Dihapus!'); location.href = \"../admin/data_aktual.php?barang\"; </script>";
} else {
    echo "<script> alert('Data Berhasil Dihapus'); location.href = \"../admin/data_aktual.php?barang\"; </script>";
}
