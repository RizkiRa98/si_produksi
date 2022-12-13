<?php
include '../koneksi.php';
require('../view/header.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard?dashboard.php">
                <div class="sidebar-brand-text mx-3">CV. Renosaf Mebeul </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php?dashboard">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="peramalan.php?peramalan">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Peramalan</span></a>
            </li>


            <!-- Nav Item - Dashboard -->
            <div class="sidebar-heading">
                Kegiatan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="perencanaan.php?perencanaan">
                    <i class="fas fa-fw fa-sticky-note"></i>
                    <span>Perencanaan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="penjadwalan.php?penjadwalan">
                    <i class="fas fa-fw fa-calendar-day"></i>
                    <span>Penjadwalan</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="produksi.php?produksi">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Produksi</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Produk
            </div>

            <li class="nav-item">
                <a class="nav-link" href="tipeproduk.php?produk">
                    <i class="fas fa-fw fa-couch"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="barang.php?barang">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Barang</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="bahan.php?bahan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bahan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Pengguna
            </div>

            <li class="nav-item">
                <a class="nav-link" href="pengguna.php?pengguna">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pengguna</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->