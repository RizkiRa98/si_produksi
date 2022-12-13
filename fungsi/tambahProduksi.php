<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_penjadwalan = $_POST['id_penjadwalan'];
    $id_user = $_POST['id_user'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $nama_pelaksana = $_POST['nama_pelaksana'];
    $id_barang = $_POST['id_barang'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];
    $catatan = $_POST['catatan'];

    $query = mysqli_query($conf, "SELECT id_penjadwalan FROM produksi WHERE id_penjadwalan = '$id_penjadwalan' ");
    if ($query->num_rows > 0) {
        echo "<script> alert('Data Sudah Ada!'); location.href = \"../admin/produksi_tambah.php?produksi\"; </script>";
    } else {
        mysqli_query($conf, "INSERT INTO produksi (id_penjadwalan, id_user,  nama_konsumen, nama_pelaksana, id_barang, tgl_mulai, tgl_akhir, tgl_selesai, status, catatan) VALUES ('$id_penjadwalan', '$id_user', '$nama_konsumen', '$nama_pelaksana', '$id_barang', '$tgl_mulai', '$tgl_akhir', '$tgl_selesai', '$status', '$catatan')");
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/produksi.php?produksi\"; </script>";
    }
}
