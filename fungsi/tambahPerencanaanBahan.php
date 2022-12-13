<?php
session_start();
include '../koneksi.php';
$bhn_qty1 = '';
$bhn_qty2 =  '';
$bhn_qty3 = '';
$bhn_qty4 = '';
$bhn_qty5 = '';
$bhn_qty6 = '';
$bhn_qty7 = '';
$bhn_qty8 = '';
$bhn_qty9 = '';
$bhn_qty10 = '';
$bhn_qty11 = '';
$bhn_qty12 = '';
$bhn_qty13 = '';
$bhn_qty14 = '';
$bhn_qty15 = '';
$bhn_qty16 = '';
$bhn_qty17 = '';
$bhn_qty18 = '';
$bhn_qty19 = '';
$bhn_qty20 = '';
$bhn_qty21 = '';
$bhn_qty22 = '';
$bhn_qty23 = '';
$bhn_qty24 = '';
$bhn_qty25 = '';
$bhn_qty26 = '';
$bhn_qty27 = '';
$bhn_qty28 = '';
$bhn_qty29 = '';
$bhn_qty30 = '';
if (isset($_POST['simpan'])) {
    $counter = $_SESSION['counter'];
    $tambah = $_POST['tambah'];
    $id_perencanaan = $_POST['id_perencanaan'];
    for ($i = 1; $i < $tambah; $i++) {
        ${"bhn_qty" . $i} = $_POST['bhn_qty' . $i];
    }

    $query = mysqli_query($conf, "UPDATE perencanaan set bhn_qty1 = '$bhn_qty1', bhn_qty2 = '$bhn_qty2', bhn_qty3 = '$bhn_qty3', bhn_qty4 = '$bhn_qty4', bhn_qty5 = '$bhn_qty5', bhn_qty6 = '$bhn_qty6', bhn_qty7 = '$bhn_qty7', bhn_qty8 = '$bhn_qty8', bhn_qty9 = '$bhn_qty9', bhn_qty10 = '$bhn_qty10', bhn_qty11 = '$bhn_qty11', bhn_qty12 = '$bhn_qty12', bhn_qty13 = '$bhn_qty13', bhn_qty14 = '$bhn_qty14', bhn_qty15 = '$bhn_qty15', bhn_qty16 = '$bhn_qty16', bhn_qty17 = '$bhn_qty17', bhn_qty18 = '$bhn_qty18', bhn_qty19 = '$bhn_qty19', bhn_qty20 = '$bhn_qty20', bhn_qty20 = '$bhn_qty20', bhn_qty20 = '$bhn_qty20', bhn_qty20 = '$bhn_qty20', bhn_qty21 = '$bhn_qty21', bhn_qty21 = '$bhn_qty21', bhn_qty22 = '$bhn_qty22', bhn_qty23 = '$bhn_qty23', bhn_qty24 = '$bhn_qty24', bhn_qty25 = '$bhn_qty25', bhn_qty26 = '$bhn_qty26', bhn_qty27 = '$bhn_qty27', bhn_qty28 = '$bhn_qty28', bhn_qty29 = '$bhn_qty29', bhn_qty30 = '$bhn_qty30' WHERE id_perencanaan= '$id_perencanaan'");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/perencanaan_edit.php?perencanaan\"; </script>";
    } else {
        echo "<script> alert('Data Bahan Berhasil Di Tambah'); location.href = \"../admin/perencanaan.php?perencanaan\"; </script>";
    }
}
