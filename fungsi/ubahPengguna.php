<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];

    $query = mysqli_query($conf, "UPDATE user set nama_user = '$nama_user', email = '$email', password = '$password', jabatan = '$jabatan' WHERE id_user = '$id_user' ");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/pengguna_edit.php?barang\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Ubah'); location.href = \"../admin/pengguna.php?pengguna\"; </script>";
    }
}
