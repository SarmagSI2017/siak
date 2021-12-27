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
              <div class="card-header">
                <div class="row align-items-center py-0">
                  <div class="col-lg-6 col-7">
                    <h6 class="h2 d-inline-block mb-0">Laporan Aset Netto</h6>
                  </div>
                  <div class="col-6 text-right">
                    <form action="<?= base_url('laporan_pk/detail') ?>" method="post" class="d-flex flex-row justify-content-end">
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
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush" id="datatable-basic">
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
                          <?= form_open('laporan_aset_netto/detail', '', ['bulan' => $bulan, 'tahun' => $tahun]) ?>
                          <?= form_button(['type' => 'submit', 'content' => 'Lihat Laporan Aset Netto', 'class' => 'btn btn-success mr-3']) ?>
                          <?= form_close() ?>
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