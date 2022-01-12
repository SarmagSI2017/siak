<!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container">
        <div class="header-body">
          <div class="row align-items-center py-4">
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mx-auto">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Akun</h5>
                      <br>
                      <?php 
                              $sql = "SELECT COUNT(*)
                              FROM `akun_temp`";
                              $query = $this->db->query($sql);
                              $result = $query->row_array();
                              $count = $result['COUNT(*)'];
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?= $count ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mx-auto">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Jurnal Umum</h5>
                      <?php 
                              $sql = "SELECT COUNT(*)
                              FROM `akun_temp`";
                              $query = $this->db->query($sql);
                              $result = $query->row_array();
                              $count1 = $result['COUNT(*)'];
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?= $count1 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mx-auto">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Laporan Komprehensif</h5>
                      <?php 
                              $sql = "SELECT COUNT(*)
                              FROM `akun_temp`";
                              $query = $this->db->query($sql);
                              $result = $query->row_array();
                              $count2 = $result['COUNT(*)'];
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?= $count2 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mx-auto">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Laporan Posisi Keuangan</h5>
                      <?php 
                              $sql = "SELECT COUNT(*)
                              FROM `akun_temp`";
                              $query = $this->db->query($sql);
                              $result = $query->row_array();
                              $count3 = $result['COUNT(*)'];
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?= $count3 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mx-auto">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Laporan Aset Neto</h5>
                      <?php 
                              $sql = "SELECT COUNT(*)
                              FROM `akun_temp`";
                              $query = $this->db->query($sql);
                              $result = $query->row_array();
                              $count4 = $result['COUNT(*)'];
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?= $count4 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
<div></div>
<div></div>