<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_produk = $_POST['id_produk'];
    $id_barang = $_POST['id_barang'];
    $id_bahan = $_POST['id_bahan'];
    $qty = $_POST['qty'];

    $query = mysqli_query($conf, "UPDATE produk set id_barang = '$id_barang', id_bahan = '$id_bahan', qty = '$qty' WHERE id_produk = '$id_produk' ");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/tipeproduk_edit.php?produk\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Ubah'); location.href = \"../admin/tipeproduk.php?produk\"; </script>";
    }
}
