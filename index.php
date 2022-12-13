<?php
include "koneksi.php";
session_start();
$login = $_SESSION['login'];
if ($login == "admin") {
    header("location:admin/produksi.php");
} elseif ($login == "user") {
    header("location:user/produksi.php");
} else {
    header("location:login.php");
}
