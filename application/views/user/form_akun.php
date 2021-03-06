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
                    <div class="col-lg-6 col-7">
                      <h6 class="h2 d-inline-block mb-0"><?= $title ?> Data Akun </h6>
                      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4 text-primary">
                        <ol class="breadcrumb breadcrumb-links">
                          <li class="breadcrumb-item text-black"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home text-black"></i></a></li>
                          <li class="breadcrumb-item text-black"><a href="<?= base_url('data_akun') ?>">Data Unsur Akun</a></li>
                          <li class="breadcrumb-item active text-black" aria-current="page"><?= $title ?> Data Akun</li>
                        </ol>
                      </nav>
                    </div>
                  </div>
                  <div class="col-12 my-3">
                    <form action="<?= base_url($action) ?>" method="post">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label><h4><b>Unsur Akun</b></h4></label>
                            <?php if ($title == 'Edit') { 
                              $nama_unsur_o = '';
                              foreach ($dataunsur as $row) :{
                                if($data->unsur_laporan_keuangan == $row->no_unsur){
                                  $nama_unsur_o = $row->nama_unsur;
                                }
                              }
                              endforeach;
                              ?>
                               <input type="text" name="nama_unsur" class="form-control mb-3" id="nama_unsur" value="<?= $nama_unsur_o ?>" <?php if ($title == 'Edit') {echo "readonly";}?>>
                               <input type="hidden" name="unsur_laporan_keuangan" id="unsur_laporan_keuangan" value="<?= $data->unsur_laporan_keuangan ?>" />
                            <?php
                             } else {
                              ?>
                            <select class="form-control" name="unsur_laporan_keuangan" id="unsur_laporan_keuangan" required="required" <?php if ($title == 'Edit') { echo "readonly";} ?> >
                              <option disabled selected>-- Daftar Unsur Akun --</option>
                              <!-- <option value="<?= $data->no_reff ?>" ><?= $data->nama_reff ?></option> -->
                              <?php
                              foreach ($dataunsur as $row) :
                              ?>
                                <?php if ($data->unsur_laporan_keuangan == $row->no_unsur) { ?>
                                  <option selected value="<?= $row->no_unsur ?>"><?= $row->nama_unsur ?></option>
                                <?php } else { ?>
                                  <option value="<?= $row->no_unsur ?>"><?= $row->nama_unsur ?></option>
                              <?php }
                              endforeach; ?>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_ref">
                          <h4><b>No. Reff</b></h4>
                        </label>
                        <p><?= form_error('no_reff') ?></p>
                        
                        <?php if($title == 'Edit'){ ?> 
                          <input type="text" name="no_reff" class="form-control mb-3" id="no_reff" value="<?= $data->no_reff ?>" <?php if ($title == 'Edit') {echo "readonly";}?>>
                        <?php } else { ?>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><div id="tempreff">1</div>-</span>
                              
                            </div>
                            <input type="text" name="no_reff" class="form-control" id="no_reff" value="<?= $data->no_reff ?>" <?php if ($title == 'Edit') {echo "readonly";} ?>>
                          </div>
                        <?php } ?>
                          
                      </div>
                      <div class="form-group">
                        <label for="nama">
                          <h4><b>Nama Akun</b></h4>
                        </label>
                        <p><?= form_error('nama_reff') ?></p>
                        <input type="text" name="nama_reff" class="form-control mb-3" id="nama" value="<?= $data->nama_reff ?>">
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label><h4><b>Saldo Normal</b></h4></label>
                            <?php
                              if ($title == 'Edit') { ?>
                               <input type="text" name="saldo_normal" class="form-control mb-3" id="saldo_normal" value="<?= $data->saldo_normal ?>" <?php if ($title == 'Edit') {echo "readonly";}?>>
                            <?php
                               } else {
                              ?>
                            <p><?= form_error('is_atomic') ?></p>
                            <select class="form-control" name="saldo_normal" id="saldo_normal" required="required" <?php if ($title == 'Edit') { echo "readonly";} ?>>
                              <option disabled selected>-- Pilih Saldo Normal --</option>
                                <option value="Debit">Debit</option>
                                <option value="Kredit">Kredit</option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="atomic">
                          <h4><b>Apakah akun ini digunakan dalam transaksi?</b></h4>
                        </label>
                        <p><?= form_error('is_atomic') ?></p>
                        <!-- <input type="checkbox" name="is_atomic" id="is_atomic" class="form-control mb-3" <?php if ($title == 'Edit') { ?> value="<?= $data->is_atomic ?>" <?php } else { ?> value="" <?php } ?> /> -->

                        <?php
                        if ($title == 'Edit') {
                          echo form_checkbox(array(
                            'name' => 'is_atomic',
                            'id' => 'is_atomic',
                            'class' => 'form-control mb-3',
                            'value' => ($data->is_atomic),
                            'checked' => (($data->is_atomic) && ($data->is_atomic) == 1)
                          ));
                        } else {
                          echo form_checkbox(array(
                            'name' => 'is_atomic',
                            'id' => 'is_atomic',
                            'class' => 'form-control mb-3',
                            'value' => '1',
                            'checked' => ($this->input->post('is_atomic') && $this->input->post('is_atomic') == 1)
                          ));
                        }
                        ?>
                      </div>

                      <div class="form-group">
                        <label for="keterangan">
                          <h4><b>Keterangan</h4></b>
                        </label>
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