<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_perencanaan = $_POST['id_perencanaan'];
    $id_user = $_POST['id_user'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $nama_pelaksana = $_POST['nama_pelaksana'];
    $id_barang = $_POST['id_barang'];
    $tgl_order = $_POST['tgl_order'];
    $bhn_qty1 = $_POST['bhn_qty1'];
    $bhn_qty2 = $_POST['bhn_qty2'];
    $bhn_qty3 = $_POST['bhn_qty3'];
    $bhn_qty4 = $_POST['bhn_qty4'];
    $bhn_qty5 = $_POST['bhn_qty5'];
    $bhn_qty6 = $_POST['bhn_qty6'];
    $bhn_qty7 = $_POST['bhn_qty7'];
    $bhn_qty8 = $_POST['bhn_qty8'];
    $bhn_qty9 = $_POST['bhn_qty9'];
    $bhn_qty10 = $_POST['bhn_qty10'];
    $bhn_qty11 = $_POST['bhn_qty11'];
    $bhn_qty12 = $_POST['bhn_qty12'];
    $bhn_qty13 = $_POST['bhn_qty13'];
    $bhn_qty14 = $_POST['bhn_qty14'];
    $bhn_qty15 = $_POST['bhn_qty15'];
    $bhn_qty16 = $_POST['bhn_qty16'];
    $bhn_qty17 = $_POST['bhn_qty17'];
    $bhn_qty18 = $_POST['bhn_qty18'];
    $bhn_qty19 = $_POST['bhn_qty19'];
    $bhn_qty20 = $_POST['bhn_qty20'];
    $bhn_qty21 = $_POST['bhn_qty21'];
    $bhn_qty22 = $_POST['bhn_qty22'];
    $bhn_qty23 = $_POST['bhn_qty23'];
    $bhn_qty24 = $_POST['bhn_qty24'];
    $bhn_qty25 = $_POST['bhn_qty25'];
    $bhn_qty26 = $_POST['bhn_qty26'];
    $bhn_qty27 = $_POST['bhn_qty27'];
    $bhn_qty28 = $_POST['bhn_qty28'];
    $bhn_qty29 = $_POST['bhn_qty29'];
    $bhn_qty30 = $_POST['bhn_qty30'];

    $query = mysqli_query($conf, "UPDATE perencanaan set id_user = '$id_user',  nama_konsumen = '$nama_konsumen', nama_pelaksana = '$nama_pelaksana', id_barang = '$id_barang', tgl_order = '$tgl_order', bhn_qty1 = '$bhn_qty1', bhn_qty2 = '$bhn_qty2', bhn_qty3 = '$bhn_qty3', bhn_qty4 = '$bhn_qty4', bhn_qty5 = '$bhn_qty5', bhn_qty6 = '$bhn_qty6', bhn_qty7 = '$bhn_qty7', bhn_qty8 = '$bhn_qty8', bhn_qty9 = '$bhn_qty9', bhn_qty10 = '$bhn_qty10', bhn_qty11 = '$bhn_qty11', bhn_qty12 = '$bhn_qty12', bhn_qty13 = '$bhn_qty13', bhn_qty14 = '$bhn_qty14', bhn_qty15 = '$bhn_qty15', bhn_qty16 = '$bhn_qty16', bhn_qty17 = '$bhn_qty17', bhn_qty18 = '$bhn_qty18', bhn_qty19 = '$bhn_qty19', bhn_qty20 = '$bhn_qty20', bhn_qty20 = '$bhn_qty20', bhn_qty20 = '$bhn_qty20', bhn_qty20 = '$bhn_qty20', bhn_qty21 = '$bhn_qty21', bhn_qty21 = '$bhn_qty21', bhn_qty22 = '$bhn_qty22', bhn_qty23 = '$bhn_qty23', bhn_qty24 = '$bhn_qty24', bhn_qty25 = '$bhn_qty25', bhn_qty26 = '$bhn_qty26', bhn_qty27 = '$bhn_qty27', bhn_qty28 = '$bhn_qty28', bhn_qty29 = '$bhn_qty29', bhn_qty30 = '$bhn_qty30' WHERE id_perencanaan= '$id_perencanaan'");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/perencanaan_edit.php?perencanaan\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Ubah'); location.href = \"../admin/perencanaan.php?perencanaan\"; </script>";
    }
}
