<!-- 
	TODO : 
	- Cek perhitungannya sudah bener apa belum
	- Tombol untuk print ke PDF
-->

<!-- Main content -->
<div class="main-content">
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Laporan
        Aset Netto</a>
      <!-- Form -->
      <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">

        </div>
      </form>
      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
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
  </nav>
  <!-- Header -->
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-8 mb-5 mb-xl-0">

      </div>
    </div>
    <div class="row mt-5">
      <div class="col mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Laporan Aset Netto</h3>
              </div>
            </div>
          </div>

          <!-- -->
          <div class="table-responsive">
            <?php
            $a = 0;
            $debit = 0;
            $kredit = 0;
            $hasil = 0;
            ?>
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">
                    <!-- No. Akun -->
                  </th>
                  <th scope="col">Nama Akun</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
                <!-- PENDAPATAN -->
                <tr>
                  <td>Pendapatan</td>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                $totalPendapatan = 0;
                $totalBeban = 0;
                for ($i = 0; $i < $jumlah; $i++) :
                  $a++;
                  $s = 0;
                  $deb = $saldo[$i];
                ?>
                  <?php if (substr($data[$i][$s]->no_reff, 0, 1) == "4") { ?>
                    <tr>
                      <td>
                        <!-- <?= $data[$i][$s]->no_reff ?> -->
                      </td>
                      <td>
                        <?= $data[$i][$s]->nama_reff ?>
                      </td>
                      <?php
                      for ($j = 0; $j < count($data[$i]); $j++) :
                        $hasil += $deb[$j]->saldo;
                      endfor;
                      $totalPendapatan += $hasil;
                      ?>

                      <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                    </tr>
                  <?php } ?>
                <?php endfor;
                $hasil = 0; ?>
                <tr style="background-color:aquamarine;">
                  <td>Total Pendapatan</td>
                  <td></td>
                  <td><?= 'Rp. ' . number_format($totalPendapatan, 0, ',', '.') ?></td>
                </tr>
                <!-- END OF PENDAPATAN -->

                <!-- BEBAN -->
                <tr>
                  <td>Beban</td>
                  <td></td>
                  <td></td>
                </tr>
                <?php
                for ($i = 0; $i < $jumlah; $i++) :
                  $a++;
                  $s = 0;
                  $deb = $saldo[$i];
                ?>
                  <?php if (substr($data[$i][$s]->no_reff, 0, 1) == "5") { ?>
                    <tr>
                      <td>
                        <!-- <?= $data[$i][$s]->no_reff ?> -->
                      </td>
                      <td>
                        <?= $data[$i][$s]->nama_reff ?>
                      </td>
                      <?php
                      for ($j = 0; $j < count($data[$i]); $j++) :
                        $hasil += $deb[$j]->saldo;
                      endfor;
                      $totalBeban += $hasil;
                      ?>

                      <td><?= 'Rp. ' . number_format($hasil, 0, ',', '.') ?></td>
                    </tr>
                  <?php } ?>
                <?php endfor ?>
                <tr style="background-color:aquamarine;">
                  <td>Total Beban</td>
                  <td></td>
                  <td><?= 'Rp. ' . number_format($totalBeban, 0, ',', '.') ?></td>
                </tr>
                <!-- END OF BEBAN -->

                <tr style="background-color:bisque;">
                  <?php
                  $surplus = $totalPendapatan - $totalBeban;

                  if ($surplus > 0) { ?>
                    <td>Surplus(Defisit)</td>
                    <td></td>
                    <td><?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?></td>
                  <?php } else { ?>
                    <td>Surplus(Defisit)</td>
                    <td></td>
                    <td>(<?= 'Rp. ' . number_format(abs($surplus), 0, ',', '.') ?>)</td>
                  <?php } ?>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>