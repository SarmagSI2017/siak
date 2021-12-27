<!-- Footer -->
<footer class="footer">
  <div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6">
      <div class="copyright text-center text-xl-left text-muted">
        &copy; 2021 <a class="font-weight-bold ml-1" target="_blank">SARMAG SIB</a>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Optional JS -->
<!-- <script src="<? base_url('assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<? base_url('assets/vendor/datatables.net-select/js/dataTables.select.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/dist/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/dist/Chart.extension.js') ?>"></script>
<script src="<?= base_url('assets/vendor/dropzone/dist/min/dropzone.min.js') ?>"></script> -->
<!-- Argon JS -->
<script src="<?= base_url('assets/js/argon.js?v=1.0.0') ?>"></script>
<!-- Datepicker -->
<script src="<?= base_url('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- SWEETALERT -->
<script src="<?= base_url('assets/vendor/sweetalert/sweetalert2.all.min.js') ?>"></script>
<!-- Custom JS -->
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script>
  $(document).ready(function() {
    $(".add-more").click(function() {
      var html = $(".copy").html();
      $(".after-add-more").after(html);
    });

    // saat tombol remove dklik control group akan dihapus 
    $("body").on("click", ".remove", function() {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<?php
$pesan = $this->session->flashdata('berhasil');
if (!empty($pesan)) :
?>
  <!-- SCRIPT SWEETALERT INLINE -->
  <script>
    $(window).on('load', function() {
      let pesan = "<?= $pesan ?>";
      swal('Berhasil!', pesan, 'success');
    });
  </script>
<?php endif; ?>

<?php
$pesan = $this->session->flashdata('berhasilHapus');
if (!empty($pesan)) :
?>
  <script>
    $(window).on('load', function() {
      let pesan = "<?= $pesan ?>";
      swal('Berhasil!', pesan, 'success');
    });
  </script>
<?php endif; ?>

<?php
$pesan = $this->session->flashdata('dataNull');
if (!empty($pesan)) :
?>
  <script>
    $(window).on('load', function() {
      let pesan = "<?= $pesan ?>";
      swal('Oops!', pesan, 'error');
    });
  </script>
<?php endif; ?>
</body>

</html>