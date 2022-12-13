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

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php?dashboard">
                <div class="sidebar-brand-text mx-3">CV. Renosaf Mebeul </div>
            </a>

            <li class="nav-item">
                <a class="nav-link" href="produksi.php?produksi">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Produksi</span></a>
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