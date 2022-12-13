<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];

    $query = mysqli_query($conf, "SELECT nama_barang FROM barang WHERE nama_barang = '$nama_barang' ");
    if ($query->num_rows > 0) {
        echo "<script> alert('Data Sudah Ada!'); location.href = \"../admin/barang_tambah.php?barang\"; </script>";
    } else {
        for ($i = 0; $i < sizeof($nama_barang); $i++) {
            $insert = mysqli_query($conf, "INSERT INTO barang( id_barang, nama_barang) VALUES ('$id_barang','$nama_barang[$i]') ORDER BY id_barang asc");
        }
        if ($insert) {
            echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/barang.php?barang\"; </script>";
        }
    }
}
