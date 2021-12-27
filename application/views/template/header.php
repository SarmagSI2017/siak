<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>SIA | <?= $titleTag ?></title>
    <!-- Favicon -->
    <link href="<?= base_url('assets/img/brand/favicon.png') ?>" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="<?= base_url('assets/vendor/nucleo/css/nucleo.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <!-- Page plugins -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/vendor/select2/dist/css/select2.min.css') ?>"> -->
    <!-- Argon CSS -->
    <link type="text/css" href="<?= base_url('assets/css/argon.css?v=1.0.0') ?>" rel="stylesheet">
    <link type="text/css" href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<!-- Sidenav -->

<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
                <img src="<?= base_url('assets/img/brand/blue.png') ?>" class="navbar-brand-img" alt="...">
            </a>
            <a class="navbar-brand pt-0" href="./index.html">
                <img src="<?= base_url('assets/img/brand/blue.png') ?>" class="navbar-brand-img" alt="...">
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
                            <i class="ni ni-tv-2 text-primary"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('data_akun') ?>">
                            <i class="ni ni-bullet-list-67 text-red"></i> Data Akun
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('buku_besar') ?>">
                            <i class="ni ni-collection text-red"></i> Buku Besar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('neraca_saldo') ?>">
                            <i class="ni ni-book-bookmark text-yellow"></i> Neraca Saldo
                        </a>
                    </li> -->
                    <div class="accordion" id="accordionExample">
                        <div>
                            <a href="#" class="nav-link" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-file-alt text-yellow"></i>Laporan
                            </a>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan') ?>">
                                            <i class="fas fa-file-pdf text-red"></i>Laporan
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_kompre') ?>">
                                            <i class="fas fa-file-alt text-yellow"></i>Laporan Komprehensif
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_pk') ?>">
                                            <i class="fas fa-file-alt text-yellow"></i>Laporan Posisi Keuangan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url('laporan_aset_netto') ?>">
                                            <i class="fas fa-file-alt text-yellow"></i>Laporan Aset Neto
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('jurnal_umum') ?>">
                            <i class="ni ni-single-copy-04 text-red"></i> Rekam Transaksi
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="<?= base_url('assets/img/brand/blue.png') ?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?= base_url('assets/img/theme/team-4-800x800.jpg') ?>">
                        </span>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="<?= base_url('assets/img/brand/blue.png') ?>">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('data_akun') ?>">
                        <i class="ni ni-bullet-list-67 text-red"></i> Data Akun
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
                <div class="accordion" id="accordionExample">
                    <div>
                        <a href="#" class="nav-link" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-file-alt text-yellow"></i>Laporan
                        </a>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- <li class="nav-item">
                                  <a class="nav-link" href="<?= base_url('laporan') ?>">
                                      <i class="fas fa-file-pdf text-red"></i>Laporan
                                  </a>
                              </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('laporan_kompre') ?>">
                                        <i class="fas fa-file-alt text-yellow"></i>Laporan Komprehensif
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('laporan_pk') ?>">
                                        <i class="fas fa-file-alt text-yellow"></i>Laporan Posisi Keuangan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('laporan_aset_netto') ?>">
                                        <i class="fas fa-file-alt text-yellow"></i>Laporan Aset Neto
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('jurnal_umum') ?>">
                        <i class="ni ni-single-copy-04 text-red"></i> Rekam Transaksi
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>