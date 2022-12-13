<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($conf, "SELECT * FROM user WHERE email = '$email' AND password = '$password' ");

    if (mysqli_num_rows($query) !== 0) {
        $_GET = mysqli_fetch_array($query);
        $jabatan = $_GET['jabatan'];
        $nama = $_GET['nama_user'];
        $_SESSION['nama'] = $nama;
        $_SESSION['login_in'] = $email;
        if ($jabatan == "kepalaproduksi") {
            echo "<script> alert('Selamat Datang $jabatan'); location.href = \"admin/dashboard.php\"; </script>";
        } elseif ($jabatan == "ketuagrup") {
            echo "<script> alert('Selamat Datang $jabatan'); location.href = \"user/produksi.php\"; </script>";
        } elseif ($jabatan == "pemimpin") {
            echo "<script> alert('Selamat Datang $jabatan'); location.href = \"user/dashboard.php\"; </script>";
        }
    } else {
        $_SESSION['status'] = 'Login Gagal ! Email atau Password Salah!';
        header("location: login.php");
        exit(0);
    }
} else {
    echo "<script> alert('Belum Login! Dilarang Masuk!'); location.href = \"login.php\"; </script>";
}
