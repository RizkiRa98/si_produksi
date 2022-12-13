<?php
include '../koneksi.php';
$email = "email";
if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $nama_user = $_POST['nama_user'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];

    $query = mysqli_query($conf, "SELECT email from user where email = '$email'");
    if ($query->num_rows > 0) {
        echo "<script> alert('Email Sudah Ada!'); location.href = \"../admin/pengguna_tambah.php?pengguna\"; </script>";
    } else {
        mysqli_query($conf, "INSERT INTO user( nama_user, email, password, jabatan) VALUES ('$nama_user', '$email', '$password', '$jabatan')");
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/pengguna.php?pengguna\"; </script>";
    }
}
