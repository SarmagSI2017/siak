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
                <h6 class="h2 d-inline-block mb-0">Detail Rekam Transaksi </h6>
                  <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4 text-primary">
                    <ol class="breadcrumb breadcrumb-links">
                      <li class="breadcrumb-item text-black"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home text-black"></i></a></li>
                      <li class="breadcrumb-item active text-black" aria-current="page" href="<?= base_url('jurnal_umum') ?>">Rekam Transaksi</li>
                      <li class="breadcrumb-item active text-black" aria-current="page">Detail Rekam Transaksi</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Akun</th>
                    <th scope="col">Ref</th>
                    <th scope="col">Debet</th>
                    <th scope="col">Kredit</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    foreach($jurnals as $row):
                      if($row->jenis_saldo=='debit'):
                  ?>
                  <tr>
                    <td>
                      <?= date_indo($row->tgl_transaksi) ?>
                    </td>
                    <td>
                    <?= $row->nama_reff ?>
                    </td>
                    <td>
                    <?= $row->no_reff ?>
                    </td>
                    <td>
                    <?= 'Rp. '.number_format($row->saldo,0,',','.') ?>
                    </td>
                    <td>
                      Rp. 0
                    </td>
                    <td class="d-flex justify-content-center">
                      <?= form_open('jurnal_umum/edit_form','',['id'=>$row->id_transaksi]) ?>
                      <?= form_button(['type'=>'submit','content'=>'Edit','class'=>'btn btn-warning mr-3']) ?>
                      <?= form_close() ?>

                      <?= form_open('jurnal_umum/hapus',['class'=>'form'],['id'=>$row->id_transaksi]) ?>
                      <?= form_button(['type'=>'submit','content'=>'Hapus','class'=>'btn btn-danger hapus']) ?>
                      <?= form_close() ?>
                    </td>       
                  </tr>
                  <?php 
                    endif;
                    if($row->jenis_saldo=='kredit'):
                  ?>
                  <tr>
                    <td><?= date_indo($row->tgl_transaksi) ?></td>
                    <td class="text-right"><?= $row->nama_reff ?></td>
                    <td><?= $row->no_reff ?></td>
                    <td>
                      Rp. 0
                    </td>
                    <td>
                    <?= 'Rp. '.number_format($row->saldo,0,',','.') ?>
                    </td>
                    <td class="d-flex justify-content-center">
                      <?= form_open('jurnal_umum/edit_form','',['id'=>$row->id_transaksi]) ?>
                      <?= form_button(['type'=>'submit','content'=>'Edit','class'=>'btn btn-warning mr-3']) ?>
                      <?= form_close() ?>

                      <?= form_open('jurnal_umum/hapus',['class'=>'form'],['id'=>$row->id_transaksi]) ?>
                      <?= form_button(['type'=>'submit','content'=>'Hapus','class'=>'btn btn-danger hapus']) ?>
                      <?= form_close() ?>
                    </td>       
                  </tr>  
                  <?php endif;?>
                  <?php endforeach ?>
                  <?php if($totalDebit->saldo != $totalKredit->saldo){ ?>
                  <tr>
                    <td colspan="3" class="text-center"><b>Jumlah Total</b></td>
                    <td class="text-danger"><b><?= 'Rp. '.number_format($totalDebit->saldo,0,',','.') ?></b></td>
                    <td colspan="2" class="text-danger"><b><?= 'Rp. '.number_format($totalKredit->saldo,0,',','.') ?></b></td>
                  </tr>
                  <tr  class="text-center bg-danger ">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                  </tr>
                  <?php }else{  ?>
                    <tr>
                    <td colspan="3" class="text-center"><b>Jumlah Total</b></td>
                    <td class="text-success"><b><?= 'Rp. '.number_format($totalDebit->saldo,0,',','.') ?></b></td>
                    <td colspan="2" class="text-success"><b><?= 'Rp. '.number_format($totalKredit->saldo,0,',','.') ?></b></td>
                  </tr>
                  <tr class="text-center bg-success">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>