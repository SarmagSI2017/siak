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
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <div class="row align-items-center py-0">
            <div class="col-lg-6 col-7">
              <h6 class="h2 d-inline-block mb-0">Data Akun</h6>
            </div>
            <div class="col-6 text-right">
              <a href="<?= base_url('data_akun/tambah') ?>" class="btn btn-primary mt-2">Tambah Akun</a>
            </div>
          </div>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th>No.</th>
                <th>No.Reff</th>
                <th class="text-center">Nama Reff</th>
                <th class="text-center">Keterangan Reff</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>No.Reff</th>
                <th class="text-center">Nama Reff</th>
                <th class="text-center">Keterangan Reff</th>
                <th class="text-center">Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php
              $no = 1;
              foreach ($dataAkun as $row) :
              ?>
               <tr>
                  <td>
                    <?= $no++ ?>
                  </td>
                  <td>
                    <?= $row->no_reff ?>
                  </td>
                  <td>
                    <?= $row->nama_reff ?>
                  </td>
                  <td>
                    <?= $row->keterangan ?>
                  </td>
                  <td class="d-flex justify-content-center">
                    <a href="<?= base_url('data_akun/edit/' . $row->no_reff) ?>" class="btn btn-warning mb-4">Edit</a>
                    <?= form_open('data_akun/hapus', ['class' => 'form'], ['id' => $row->no_reff]) ?>
                    <?= form_button(['type' => 'submit', 'content' => 'Hapus', 'class' => 'btn btn-danger hapus']) ?>
                    <?= form_close() ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>