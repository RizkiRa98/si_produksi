<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_bahan = $_POST['id_bahan'];
    $nama_bahan = $_POST['nama_bahan'];

    $query = mysqli_query($conf, "SELECT nama_bahan FROM bahan WHERE nama_bahan = '$nama_bahan' ");
    if ($query->num_rows > 0) {
        echo "<script> alert('Data Sudah Ada!'); location.href = \"../admin/bahan_tambah.php?bahan\"; </script>";
    } else {
        mysqli_query($conf, "INSERT INTO bahan( id_bahan, nama_bahan) VALUES ('$id_bahan', '$nama_bahan') ORDER BY id_bahan asc");
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/bahan.php?bahan\"; </script>";
    }
}
