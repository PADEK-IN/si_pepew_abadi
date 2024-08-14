<div class="container">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs" style="margin:0;">
                    <li class="nav-home">
                        <a href="/admin/dashboard">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <b>Pengiriman</b>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Laporan Pengiriman</h4>
                            <a class="btn btn-sm btn-warning btn-round ms-auto no-print" href="#" onclick="printReport()">
                                <i class="fas fa-file-alt"></i>
                                Print
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>ID Pesanan</th>
                                            <th>Tanggal</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($pengiriman == 0) { ?>
                                            <tr>
                                                <td colspan="6">Data pengiriman Masih Kosong</td>
                                            </tr>
                                        <?php } else { ?>
                                            <?php if(isset($pengiriman)): ?>
                                                <?php foreach ($pengiriman as $index => $item): ?>
                                                    <tr>
                                                        <td><?php echo $index + 1; ?></td>
                                                        <td><?php echo $item['pelanggan']['nama']; ?></td>
                                                        <td><?php echo $item['id_pesanan']; ?></td>
                                                        <td><?php echo $item['tanggal']; ?></td>
                                                        <td><?php echo $item['alamat']; ?></td>
                                                        <td>
                                                            <?php if($item['status'] == 'terkirim') {?>
                                                                <span class="badge badge-success">Terkirim</span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-warning">Diproses</span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printReport() {
            var table = document.getElementById('multi-filter-select');
            
            // Simpan ID tabel saat ini
            var originalId = table.id;
            
            // Ganti ID tabel untuk tujuan print
            table.id = 'print-table';
            
            var printWindow = window.open('', '', 'height=800,width=1200');
            printWindow.document.write('<html><head><title>Print Tagihan</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('body { font-family: Arial, sans-serif; }');
            printWindow.document.write('.header { text-align: center; margin-bottom: 20px; }');
            printWindow.document.write('.footer { text-align: center; margin-top: 20px; }');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; }');
            printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }');
            printWindow.document.write('th { background-color: #f2f2f2; }');
            printWindow.document.write('</style></head><body>');
            
            // Header
            printWindow.document.write('<div style="margin-bottom:3rem;text-align:center;">');
            printWindow.document.write('<h1 tyle="margin:0; padding:0;">CV. Samudera Abadi</h1>');
            printWindow.document.write('<p style="margin:0; padding:0;">Jl. Pangeran Hidayat Paal Lima Perm. Taman Tamarona Blok C 14 Kota Baru, Kota Jambi</p>');
            printWindow.document.write('<p tyle="margin:0; padding:0;">Telepon. 0022-7005-0707 - Bu Siti Hardina</p>');
            printWindow.document.write('</div>');
            
            // Laporan
            printWindow.document.write('<h2 style="text-align: center;">Laporan Pengiriman</h2>');
            
            // Tabel Laporan
            printWindow.document.write(document.querySelector('#print-table').outerHTML);
            
            // Footer
            printWindow.document.write('<div style="text-align: right; margin-top: 4rem;>');
            printWindow.document.write('<p style="margin-bottom:3rem; text-align: center;">Admin,</p>');
            printWindow.document.write('<p style="margin-top:3rem;">____________</p>');
            printWindow.document.write('</div>');
            
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.onafterprint = function() {
                // Kembalikan ID tabel ke semula
                table.id = originalId;
                printWindow.close();
                // window.location.href = '/admin/pengiriman'; // Kembali ke halaman awal setelah print
            };
        }

        document.querySelector('.btn-warning').addEventListener('click', function(event) {
            event.preventDefault();
            printReport();
        });
    </script>