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
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label><h4><b>Unsur Akun</b></h4></label>
                            <select class="form-control" name="unsur_laporan_keuangan" id="unsur_laporan_keuangan" onchange="addData()" required="required" <?php if ($title == 'Edit') { echo "readonly";} ?> >
                              <option disabled selected>-- Daftar Unsur Akun --</option>
                              <!-- <option value="<?= $data->no_reff ?>" ><?= $data->nama_reff ?></option> -->
                              <?php
                                foreach ($dataunsur as $row) :
                              ?>
                                <?php if($data->unsur_laporan_keuangan == $row->no_unsur) {?>
                                  <option selected value="<?= $row->no_unsur ?>"><?= $row->nama_unsur ?></option>
                                <?php }else {?>
                                  <option value="<?= $row->no_unsur ?>"><?= $row->nama_unsur ?></option>
                              <?php }endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_ref"><h4><b>No. Reff</b></h4></label>
                        <p><?= form_error('no_reff') ?></p>
                        <input type="text" name="no_reff" class="form-control mb-3" id="no_reff" value="<?= $data->no_reff ?>" <?php if ($title == 'Edit') {
                                                                                                                                  echo "readonly";
                                                                                                                                } ?>>
                      </div>
                      <div class="form-group">
                        <label for="nama"><h4><b>Nama Akun</b></h4></label>
                        <p><?= form_error('nama_reff') ?></p>
                        <input type="text" name="nama_reff" class="form-control mb-3" id="nama" value="<?= $data->nama_reff ?>">
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label><h4><b>Saldo Normal</b></h4></label>
                            <p><?= form_error('is_atomic') ?></p>
                            <select class="form-control" name="saldo_normal" id="saldo_normal" required="required" <?php if ($title == 'Edit') { echo "readonly";} ?>>
                              <option disabled selected>-- Pilih Saldo Normal --</option>
                              <?php
                                if ($title == 'Edit') {
                              ?>
                                <option <?php if ($data->saldo_normal == 'Debit') { echo "selected";} ?> value="Debit" >Debit</option>
                                <option <?php if ($data->saldo_normal == 'Kredit') { echo "selected";} ?> value="Kredit" >Kredit</option>
                              <?php
                                } else {
                              ?>
                                <option value="Debit" >Debit</option>
                                <option value="Kredit" >Kredit</option>
                              <?php
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="atomic"><h4><b>Apakah akun ini digunakan dalam transaksi?</b></h4></label>
                        <p><?= form_error('is_atomic') ?></p>
                        <!-- <input type="checkbox" name="is_atomic" id="is_atomic" class="form-control mb-3" <?php if ($title == 'Edit') { ?> value="<?= $data->is_atomic ?>" <?php } else { ?> value="" <?php } ?> /> -->

                        <?php 
                        if ($title == 'Edit') {
                          echo form_checkbox(array(
                            'name' => 'is_atomic',
                            'id' => 'is_atomic',
                            'class' => 'form-control mb-3',
                            'value' => ($data->is_atomic),
                            'checked' => (($data->is_atomic) && ($data->is_atomic)== 1 )
                        ));
                        }
                        else{
                          echo form_checkbox(array(
                            'name' => 'is_atomic',
                            'id' => 'is_atomic',
                            'class' => 'form-control mb-3',
                            'value' => '1',
                            'checked' => ($this->input->post('is_atomic') && $this->input->post('is_atomic') == 1 )
                        ));
                        }
                        ?>
                      </div>

                      <div class="form-group">
                        <label for="keterangan"><h4><b>Keterangan</h4></b></label>
                        <!-- <p><?= form_error('keterangan') ?></p> -->
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control mb-3" value=""><?= $data->keterangan ?></textarea>
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