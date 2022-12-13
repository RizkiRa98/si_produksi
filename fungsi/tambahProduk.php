<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_barang = $_POST['id_barang'];
    $id_bahan = $_POST['id_bahan'];
    $qty = $_POST['qty'];

    $query = mysqli_query($conf, "INSERT INTO produk (id_barang, id_bahan, qty) VALUES ('$id_barang', '$id_bahan', '$qty')");
    if (!$query) {
        echo "<script> alert('Data Tidak Boleh Kosong'); location.href = \"../admin/tipeproduk_tambah.php?produk\"; </script>";
    } else {
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/tipeproduk.php?produk\"; </script>";
    }
}
