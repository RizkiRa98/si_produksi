<?php
include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $id_penjadwalan = $_POST['id_penjadwalan'];
    $id_user = $_POST['id_user'];
    $id_perencanaan = $_POST['id_perencanaan'];
    $nama_konsumen = $_POST['nama_konsumen'];
    $nama_pelaksana = $_POST['nama_pelaksana'];
    $id_barang = $_POST['id_barang'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];

    $query = mysqli_query($conf, "SELECT id_perencanaan FROM penjadwalan WHERE id_perencanaan = '$id_perencanaan' ");
    if ($query->num_rows > 0) {
        echo "<script> alert('Data Sudah Ada!'); location.href = \"../admin/penjadwalan_tambah.php?penjadwalan\"; </script>";
    } else {
        mysqli_query($conf, "INSERT INTO penjadwalan(id_penjadwalan, id_user,  id_perencanaan, nama_konsumen, nama_pelaksana, id_barang, tgl_mulai, tgl_akhir) VALUES ('$id_penjadwalan', '$id_user', '$id_perencanaan', '$nama_konsumen', '$nama_pelaksana', '$id_barang', '$tgl_mulai', '$tgl_akhir') ");
        echo "<script> alert('Data Berhasil Disimpan'); location.href = \"../admin/penjadwalan.php?penjadwalan\"; </script>";
    }
}
