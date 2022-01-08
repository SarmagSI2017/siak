      <!-- Header -->
      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--6">
        <div class="row mt-5">
          <div class="col mb-5 mb-xl-0">
            <div class="card shadow">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                  <h3 class="mb-3"><?= $title ?> Rekam Transaksi</h3>
                </div>
                <div class="col-12 my-3 form-1">
                  <form action="<?= base_url($action) ?>" method="post">
                    <div class="control-group after-add-more">
                      <?php
                      if (!empty($id)) :
                      ?>
                        <input type="hidden" name="id" value="<?= $id ?>">
                      <?php endif; ?>
                      <div class="row mb-4">
                        <div class="col-4">
                          <label for="datepicker">Tanggal</label>
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control" id="datepicker" name="tgl_transaksi" type="text" value="<?= $data->tgl_transaksi ?>">
                          </div>
                          <?= form_error('tgl_transaksi') ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col">
                          <label for="no_reff">Nama Akun</label>
                          <?= form_dropdown('no_reff[]', getDropdownList('akun', ['no_reff', 'nama_reff']), $data->no_reff, ['class' => 'form-control', 'id' => 'no_reff']); ?>
                          <?= form_error('no_reff') ?>
                        </div>
                        <div class="col">
                          <label for="reff">No. Reff</label>
                          <input type="text" name="reff[]" class="form-control" id="reff" readonly>
                        </div>
                        <div class="col">
                          <label for="jenis_saldo">Jenis Saldo</label>
                          <?= form_dropdown('jenis_saldo[]', ['debit' => 'Debit', 'kredit' => 'Kredit'], $data->jenis_saldo, ['class' => 'form-control jenis_saldo', 'id' => 'jenis_saldo']); ?>
                          <?= form_error('jenis_saldo') ?>
                        </div>
                        <div class="col">
                          <label for="saldo">Saldo</label>
                          <input type="text" name="saldo[]" class="form-control saldo" id="saldo" value="<?= $data->saldo ?>">
                          <?= form_error('saldo') ?>
                        </div>
                        <div class="col">
                          <label for="keterangan">Keterangan</label>
                          <input type="text" name="keterangan[]" class="form-control saldo" id="keterangan" value="">
                          <?= form_error('saldo') ?>
                        </div>
                        <div class="col">
                          <label for="addon" class="mb-5"> </label>
                          <button class="btn btn-success mt-3 add-more" type="button">
                            <i class="glyphicon glyphicon-plus"></i> Add
                          </button>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="col-12" id="form_jurnal_prepend">
                      <button class="btn btn-primary" type="submit" id="button_jurnal"><?= $title ?></button>
                    </div>
                  </form>
                </div>

                <div class="copy invisible">
                  <div class="control-group">
                    <?php
                    if (!empty($id)) :
                    ?>
                      <input type="hidden" name="id" value="<?= $id ?>">
                      <?php endif; ?>
                      <div class="row mb-4">
                        <div class="col">
                          <label for="no_reff">Nama Akun</label>
                          <?= form_dropdown('no_reff[]', getDropdownList('akun', ['no_reff', 'nama_reff']), $data->no_reff, ['class' => 'form-control', 'id' => 'no_reff']); ?>
                          <?= form_error('no_reff') ?>
                        </div>
                        <div class="col">
                          <label for="reff">No. Reff</label>
                          <input type="text" name="reff[]" class="form-control" id="reff" readonly>
                        </div>
                        <div class="col">
                          <label for="jenis_saldo">Jenis Saldo</label>
                          <?= form_dropdown('jenis_saldo[]', ['debit' => 'Debit', 'kredit' => 'Kredit'], $data->jenis_saldo, ['class' => 'form-control jenis_saldo', 'id' => 'jenis_saldo']); ?>
                          <?= form_error('jenis_saldo') ?>
                        </div>
                        <div class="col">
                          <label for="saldo">Saldo</label>
                          <input type="text" name="saldo[]" class="form-control saldo" id="saldo" value="<?= $data->saldo ?>">
                          <?= form_error('saldo') ?>
                        </div>
                        <div class="col">
                          <label for="keterangan">Keterangan</label>
                          <input type="text" name="keterangan[]" class="form-control saldo" id="keterangan" value="">
                          <?= form_error('saldo') ?>
                        </div>
                        <div class="col">
                          <label for="addon" class="mb-5"> </label>
                          <button class="btn btn-danger mt-3 remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                      </div>
                      <hr>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>