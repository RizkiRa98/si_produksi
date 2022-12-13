<?php
include '../koneksi.php';
$id_perencanaan = $_GET['id_perencanaan'];
$query = mysqli_query($conf, "DELETE FROM perencanaan WHERE id_perencanaan = '$id_perencanaan'");
if (!$query) {
    echo "<script> alert('Data Tidak Berhasil Dihapus!'); location.href = \"../admin/perencanaan.php?perencanaan\"; </script>";
} else {
    echo "<script> alert('Data Berhasil Dihapus'); location.href = \"../admin/perencanaan.php?perencanaan\"; </script>";
}
