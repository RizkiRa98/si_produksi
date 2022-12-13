<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];

    $query = mysqli_query($conf, "UPDATE barang set nama_barang = '$nama_barang' WHERE id_barang= '$id_barang' ");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/barang_edit.php?barang\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Ubah'); location.href = \"../admin/barang.php?barang\"; </script>";
    }
}
