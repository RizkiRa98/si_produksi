<?php
include '../koneksi.php';
$id_user = $_GET['id_user'];
$query = mysqli_query($conf, "DELETE FROM user WHERE id_user = '$id_user'");
if (!$query) {
    echo "<script> alert('Data Tidak Berhasil Dihapus!'); location.href = \"../admin/pengguna.php?pengguna\"; </script>";
} else {
    echo "<script> alert('Data Berhasil Dihapus'); location.href = \"../admin/pengguna.php?pengguna\"; </script>";
}
