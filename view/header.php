<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php
        if (isset($_GET['dashboard'])) {
            echo "Dashboard";
        } else if (isset($_GET['perencanaan'])) {
            echo "Perencanaan";
        } else if (isset($_GET['peramalan'])) {
            echo "Peramalan";
        } else if (isset($_GET['faktur'])) {
            echo "Faktur";
        } else if (isset($_GET['penjadwalan'])) {
            echo "Pernjadwalan";
        } else if (isset($_GET['produksi'])) {
            echo "Produksi";
        } else if (isset($_GET['produk'])) {
            echo "Produk";
        } else if (isset($_GET['barang'])) {
            echo "Barang";
        } else if (isset($_GET['bahan'])) {
            echo "Bahan";
        } else if (isset($_GET['pengguna'])) {
            echo "Data Pengguna";
        } else {
            echo "Dashboard";
        }

        ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <script src="../js/chart.min.js"></script>
    <script src="../js/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js" type="text/javascript"></script>

</head>