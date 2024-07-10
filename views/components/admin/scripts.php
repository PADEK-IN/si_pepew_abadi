<!--   Core JS Files   -->
<script src="../../assets/admin/js/core/jquery-3.7.1.min.js"></script>
<script src="../../assets/admin/js/core/popper.min.js"></script>
<script src="../../assets/admin/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../../assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="../../assets/admin/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../../assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../../assets/admin/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../../assets/admin/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<!-- <script src="../../assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

<!-- jQuery Vector Maps -->
<script src="../../assets/admin/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="../../assets/admin/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="../../assets/admin/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="../../assets/admin/js/kaiadmin.min.js"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="../../assets/admin/js/setting-demo.js"></script>
<script src="../../assets/admin/js/demo.js"></script>
<script>
    $(document).ready(function () {
      $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
          this.api()
              .columns()
              .every(function () {
              var column = this;
              var select = $(
                  '<select class="form-select"><option value=""></option></select>'
              )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

              column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                  select.append(
                      '<option value="' + d + '">' + d + "</option>"
                  );
                  });
              });
          },
      });
    });
</script>