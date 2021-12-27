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
                    <h3 class="mb-3"><?= $title ?> Data Akun</h3>
                  </div>
                  <div class="col-12 my-3">
                    <form action="<?= base_url($action) ?>" method="post">
                      <div class="form-group">
                        <label for="no_ref">No. Reff</label>
                        <p><?= form_error('no_reff') ?></p>
                        <input type="text" name="no_reff" class="form-control mb-3" id="no_reff" value="<?= $data->no_reff ?>" <?php if ($title == 'Edit') {
                                                                                                                                  echo "readonly";
                                                                                                                                } ?>>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Reff</label>
                        <p><?= form_error('nama_reff') ?></p>
                        <input type="text" name="nama_reff" class="form-control mb-3" id="nama" value="<?= $data->nama_reff ?>">
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <p><?= form_error('keterangan') ?></p>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control mb-3"><?= $data->keterangan ?></textarea>
                      </div>
                      <div class="col-12 mt-4">
                        <button type="submit" class="btn-primary btn" id="button_akun"><?= $title ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>