<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_produksi = $_POST['id_produksi'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $nama_pelaksana = $_POST['nama_pelaksana'];
    $id_barang = $_POST['id_barang'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    $query = mysqli_query($conf, "UPDATE produksi set nama_konsumen = '$nama_konsumen', nama_pelaksana = '$nama_pelaksana', id_barang = '$id_barang',tgl_selesai = '$tgl_selesai', tgl_mulai = '$tgl_mulai', tgl_akhir = '$tgl_akhir', status = '$status', catatan = '$catatan' WHERE id_produksi= '$id_produksi'");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../user/produksi_edit.php?produksi\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Ubah'); location.href = \"../user/produksi.php?produksi\"; </script>";
    }
} else {
    return;
}
