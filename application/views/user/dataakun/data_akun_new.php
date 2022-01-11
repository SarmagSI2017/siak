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
              <h6 class="h2 d-inline-block mb-0">Data Akun </h6>
            </div>
            <div class="col-6 text-right">
              <a href="<?= base_url('data_akun/all') ?>" class="btn btn-primary mt-2">Lihat List Akun</a>
            </div>
          </div>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
              <tr>
                <th>No.</th>
                <th class="text-center">Nama Unsur</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
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
                    <?= $row->nama_unsur ?>
                  </td>
                  <td class="d-flex justify-content-center">
                    <a href="<?= base_url('data_akun/detailunsur/' . $row->no_unsur) ?>" class="btn btn-primary mb-4">Detail</a>
                  
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

