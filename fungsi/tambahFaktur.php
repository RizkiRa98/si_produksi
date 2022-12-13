<?php
session_start();
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_faktur = $_POST['id_faktur'];
    $id_produksi = $_POST['id_produksi'];
    $id_barang = $_POST['id_barang'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $tgl_produksi = $_POST['tgl_produksi'];

    $tambah = $_POST['tambah'];
    for ($i = 1; $i < $tambah; $i++) {
        ${"bhn_qty" . $i} = $_POST['bhn_qty' . $i];
    }

    $query = mysqli_query($conf, "SELECT id_produksi FROM faktur WHERE id_produksi = '$id_produksi'");
    if ($query->num_rows > 0) {
        echo "<script> alert('Data Faktur Sudah Ada!'); location.href = \"../admin/produksi.php?=produksi\"; </script>";
    } else {
        mysqli_query($conf, "INSERT INTO faktur ( id_faktur, id_produksi, id_barang, nama_konsumen, tgl_produksi, bhn_qty1, bhn_qty2, bhn_qty3, bhn_qty4, bhn_qty5, bhn_qty6, bhn_qty7, bhn_qty8, bhn_qty9, bhn_qty10, bhn_qty11, bhn_qty12, bhn_qty13, bhn_qty14, bhn_qty15, bhn_qty16, bhn_qty17, bhn_qty18, bhn_qty19, bhn_qty20, bhn_qty21, bhn_qty22, bhn_qty23, bhn_qty24, bhn_qty25, bhn_qty26, bhn_qty27, bhn_qty28, bhn_qty29, bhn_qty30) VALUES ('$id_faktur', '$id_produksi', '$id_barang', '$nama_konsumen', '$tgl_produksi', '$bhn_qty1', '$bhn_qty2', '$bhn_qty3', '$bhn_qty4', '$bhn_qty5', '$bhn_qty6', '$bhn_qty7', '$bhn_qty8', '$bhn_qty9', '$bhn_qty10', '$bhn_qty11', '$bhn_qty12', '$bhn_qty13', '$bhn_qty14', '$bhn_qty15', '$bhn_qty16', '$bhn_qty17', '$bhn_qty18', '$bhn_qty19', '$bhn_qty20', '$bhn_qty21', '$bhn_qty22', '$bhn_qty23', '$bhn_qty24', '$bhn_qty25', '$bhn_qty26', '$bhn_qty27', '$bhn_qty28', '$bhn_qty29', '$bhn_qty30')");
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/produksi.php?produksi\"; </script>";
    }
}
