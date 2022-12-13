<?php
include '../koneksi.php';
$bulan = "";
$tahun = "";
if (isset($_POST['simpan'])) {
    $id_perencanaan = $_POST['id_perencanaan'];
    $id_user = $_POST['id_user'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $nama_pelaksana = $_POST['nama_pelaksana'];
    $id_barang = $_POST['id_barang'];
    $tgl_order = $_POST['tgl_order'];


    $query = mysqli_query($conf, "INSERT INTO perencanaan (id_perencanaan, id_user, id_barang, nama_konsumen, nama_pelaksana,  tgl_order) VALUES ('$id_perencanaan', '$id_user', '$id_barang', '$nama_konsumen', '$nama_pelaksana', '$tgl_order')");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/perencanaan_tambah.php?perencanaan\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/perencanaan.php?perencanaan\"; </script>";
    }
}
// $query = mysqli_query($conf, "INSERT INTO perencanaan (id_perencanaan, id_barang, bulan_tahun, minggu, qty, bhn_qty1, bhn_qty2, bhn_qty3, bhn_qty4, bhn_qty5, bhn_qty6, bhn_qty7, bhn_qty8, bhn_qty9, bhn_qty10, bhn_qty11, bhn_qty12, bhn_qty13, bhn_qty14, bhn_qty15, bhn_qty16, bhn_qty17, bhn_qty18, bhn_qty19, bhn_qty20, bhn_qty21, bhn_qty22, bhn_qty23, bhn_qty24, bhn_qty25, bhn_qty26, bhn_qty27, bhn_qty28, bhn_qty29, bhn_qty30) VALUES (NULL, $id_bahan, $bulan_tahun , $minggu, $qty, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '') ");