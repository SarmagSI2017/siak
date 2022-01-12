<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>SIA | <?= $titleTag ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/assets/img/brand/favicon.png') ?>" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/assets/css/argon.css?v=1.1.0" type="text/css') ?>">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                    <img src="<?= base_url('assets/assets/img/brand/blue.png') ?>" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('data_akun') ?>">
                                <i class="ni ni-bullet-list-67 text-red"></i>
                                <span class="nav-link-text">Data Akun</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('jurnal_umum') ?>">
                                <i class="ni ni-single-copy-04 text-red"></i>
                                <span class="nav-link-text">Rekam Transaksi</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('buku_besar') ?>">
                            <i class="ni ni-collection text-red"></i> Buku Besar
                        </a>
                        </li> -->
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('neraca_saldo') ?>">
                            <i class="ni ni-book-bookmark text-yellow"></i> Neraca Saldo
                        </a>
                        </li> -->
                            <li class="nav-item">
                            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                                <i class="fas fa-file-alt text-yellow"></i>
                                <span class="nav-link-text">Laporan</span>
                            </a>
                            <div class="collapse" id="navbar-components">
                                <ul class="nav nav-sm flex-column">
                            <!-- <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('laporan') ?>">
                                <i class="fas fa-file-pdf text-red"></i>Laporan
                            </a>
                            </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_kompre') ?>">
                                            <i class="fas fa-file-alt text-yellow"></i>
                                            <span class="nav-link-text">Laporan Komprehensif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_pk') ?>">
                                            <i class="fas fa-file-alt text-yellow"></i>
                                            <span class="nav-link-text">Laporan Posisi Keuangan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_aset_netto') ?>">
                                            <i class="fas fa-file-alt text-yellow"></i>
                                            <span class="nav-link-text">Laporan Aset Neto</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_analisis_rasio') ?>">
                                            <i class="ni ni-money-coins text-green"></i>
                                            <span class="nav-link-text">Laporan Analisis Rasio</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://forms.gle/XVmbX6aUpbGJmi138" target="_blank">
                                <i class="ni ni-single-copy-04 text-green"></i>
                                <span class="nav-link-text">Form Feedback Application</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="h2 text-white d-inline-block mb-0 text-uppercase d-none " href="#"><?= $titleTag ?></a>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="<?= base_url('assets/img/theme/team-4-800x800.jpg') ?>">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?= ucwords($this->session->userdata('username')) ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <a href="<?= base_url('logout') ?>" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>