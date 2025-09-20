      <!-- App footer start -->
      <div class="app-footer">
          <span>© Bootstrap Gallery 2023</span>
      </div>
      <!-- App footer end -->
      </div>
      <!-- App container ends -->
      </div>
      <!-- Main container end -->
      </div>
      <!-- Page wrapper end -->

      <!-- *************
			************ JavaScript Files *************
		************* -->
      <!-- Required jQuery first, then Bootstrap Bundle JS -->
      <script src="<?=base_url()?>/assets/js/jquery.min.js"></script>
      <script src="<?=base_url()?>/assets/js/bootstrap.bundle.min.js"></script>

      <!-- *************
			************ Vendor Js Files *************
		************* -->

      <!-- Overlay Scroll JS -->
      <script src="<?=base_url()?>/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
      <script src="<?=base_url()?>/assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

      <!-- Toastify JS -->
      <!-- <script src="<?=base_url()?>/assets/vendor/toastify/toastify.js"></script> -->
      <!-- <script src="<?=base_url()?>/assets/vendor/toastify/custom.js"></script> -->

      <!-- Apex Charts -->
      <script src="<?=base_url()?>/assets/vendor/apex/apexcharts.min.js"></script>
      <script src="<?=base_url()?>/assets/vendor/apex/custom/home/overview.js"></script>
      <script src="<?=base_url()?>/assets/vendor/apex/custom/home/reachedAudience.js"></script>
      <script src="<?=base_url()?>/assets/vendor/apex/custom/home/social.js"></script>
      <script src="<?=base_url()?>/assets/vendor/apex/custom/home/sparkline.js"></script>
      <script src="<?=base_url()?>/assets/vendor/apex/custom/home/sparkline2.js"></script>
      <script src="<?=base_url()?>/assets/vendor/apex/custom/home/visitors.js"></script>

      <!-- Custom JS files -->
      <script src="<?=base_url()?>/assets/js/custom.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- DataTables CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

      <!-- DataTables JS -->
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

      <script>
$(document).ready(function() {
    $('#subkriteriaTable').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10, // default 10 baris
        lengthMenu: [5, 10, 25, 50, 100], // opsi jumlah data per halaman
    });
    $('#kriteriaTable').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10, // default 10 baris
        lengthMenu: [5, 10, 25, 50, 100], // opsi jumlah data per halaman
    });
    $('#custom-table').DataTable({
        responsive: true,
        autoWidth: false,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
    });
});
      </script>

      </body>

      </html>