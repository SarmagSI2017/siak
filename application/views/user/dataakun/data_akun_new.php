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
              <h6 class="h2 d-inline-block mb-0">Unsur Data Akun </h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4 text-primary">
              <ol class="breadcrumb breadcrumb-links">
                <li class="breadcrumb-item text-black"><a href="<?= base_url('dashboard') ?>"><i class="fas fa-home text-black"></i></a></li>
                <li class="breadcrumb-item active text-black" aria-current="page">Unsur Data Akun</li>
              </ol>
            </nav>
            </div>
            <div class="col-6 text-right">
              <a href="<?= base_url('data_akun/all') ?>" class="btn btn-primary mt-2">Lihat List Akun</a>
              <a href="<?= base_url('data_akun/tambah')?>" class="btn btn-primary mt-2">Tambah Akun</a>
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

