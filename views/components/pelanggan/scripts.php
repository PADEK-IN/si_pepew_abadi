    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap4.js"></script>

    <!-- Sweet Alert -->
    <script src="/assets/admin/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableData = document.getElementById('tableData');
            new DataTable(tableData);

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