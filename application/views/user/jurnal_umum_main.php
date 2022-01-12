    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="h2 d-inline-block mb-0">List Data Akun </h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4 text-primary">
                    <ol class="breadcrumb breadcrumb-links">
                      <li class="breadcrumb-item text-black"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home text-black"></i></a></li>
                      <li class="breadcrumb-item active text-black" aria-current="page">Rekam Transaksi</li>
                    </ol>
                  </nav>
                </div>
              </div>
              <div class="row">
                <div class="col my-3">
                  <a href="<?= base_url('jurnal_umum/tambah') ?>" class="btn btn-primary mt-0">Tambah Transaksi</a>
                </div>
                <div class="col my-3">
                  <form action="<?= base_url('jurnal_umum/detail') ?>" method="post" class="d-flex flex-row justify-content-end">
                    <div class="form-group">
                      <select name="bulan" id="bulan" class="form-control">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                          echo "<option value=$i>" . bulan($i) . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group mx-3">
                      <select name="tahun" id="tahun" class="form-control">
                        <?php
                        foreach ($tahun as $row) {
                          $tahuns = date('Y', strtotime($row->tgl_transaksi));
                          echo "<option value=$tahuns>" . $tahuns . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-success" type="submit">Cari</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="table-responsive"> -->
            <!-- Projects table -->
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Bulan Dan Tahun</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;
                  foreach ($listJurnal as $row) :
                    $i++;
                    $bulan = date('m', strtotime($row->tgl_transaksi));
                    $tahun = date('Y', strtotime($row->tgl_transaksi));
                  ?>
                    <tr>
                      <td scope="col"><?= $i ?></td>
                      <td scope="col"><?= bulan($bulan) . ' ' . $tahun ?></td>
                      <td scope="col">
                        <div class="row">
                          <div class="col-md-3 mr-3">
                            <?= form_open('jurnal_umum/detail', '', ['bulan' => $bulan, 'tahun' => $tahun]) ?>
                            <?= form_button(['type' => 'submit', 'content' => 'Lihat Transaksi', 'class' => 'btn btn-success mr-3']) ?>
                            <?= form_close() ?>
                          </div>
                          <!-- <div class="col-md-3 mr-3">
                            <?= form_open('', '', ['bulan' => $bulan, 'tahun' => $tahun]) ?>
                            <?= form_button(['type' => 'submit', 'content' => 'Cetak', 'class' => 'btn btn-warning mr-3']) ?>
                            <?= form_close() ?>
                          </div> -->
                        </div>

                      </td>
                    </tr>
                  <?php
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>