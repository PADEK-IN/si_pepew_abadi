<!--   Core JS Files   -->
<script src="/assets/auth/js/core/popper.min.js"></script>
  <script src="/assets/auth/js/core/bootstrap.min.js"></script>
  <script src="/assets/auth/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/auth/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/auth/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="/assets/admin/js/plugin/sweetalert/sweetalert.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const flash = <?php echo json_encode(getFlash() ?? null); ?>;

        if (flash) {
          swal(
            flash.type.charAt(0).toUpperCase() + flash.type.slice(1), 
            flash.message, 
            flash.type
          );
        }
    });
  </script>
</body>

</html>