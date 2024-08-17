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
                        <b>Penjualan</b>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <b>Laporan</b>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Laporan Penjualan</h4>
                            <div>
                                <a class="btn btn-sm btn-warning btn-round ms-auto no-print" href="#" onclick="printReport()">
                                    <i class="fas fa-file-alt"></i>
                                    Print
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-fixed table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th style="width: 10px;">ID Pesanan</th>
                                            <th>Pemesan</th>
                                            <th>Methode</th>
                                            <th style="display: none;">Methode Pengiriman</th>
                                            <th>Sub Total</th>
                                            <!-- <th>Ongkir</th> -->
                                            <th>PPn</th>
                                            <th>Total</th>
                                            <th>Jumlah Bayar</th>
                                            <th style="display: none;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($listTagihan)): ?>
                                            <?php foreach ($listTagihan as $index => $item): ?>
                                                <tr>
                                                    <td><?= $item['created_at'] ?></td>
                                                    <td>
                                                        <a href="/admin/tagihan/<?php echo $item['id']; ?>"><?php echo $item['id_pesanan']; ?></a>
                                                    </td>
                                                    <td><?= $item['pelanggan']['nama'] ?></td>
                                                    <td>
                                                        <?php if($item['metode_bayar'] == 'cod') {
                                                            echo '<span class="badge badge-success">Cash</span>';
                                                        } else if($item['metode_bayar'] == 'transfer') {
                                                            echo '<span class="badge badge-primary">Transfer</span>';
                                                        }?>
                                                    </td>
                                                    <td style="display: none;">
                                                        <?php if($item['pesanan']['metode_kirim'] == 'diantar') {
                                                            echo '<span class="badge badge-success">Di Antar</span>';
                                                        } else {
                                                            echo '<span class="badge badge-primary">Di Jemput</span>';
                                                        }?>
                                                    </td>
                                                    <td>Rp. <?= number_format($item['pesanan']['total'], 0, ",", ".") ?></td>
                                                    <!-- <td>Rp. <?= number_format($item['pesanan']['ppn'], 0, ",", ".") ?></td> -->
                                                    <td>Rp. <?= number_format($item['pesanan']['ppn'], 0, ",", ".") ?></td>
                                                    <td>Rp. <?= number_format($item['pesanan']['ppn']+$item['pesanan']['total'], 0, ",", ".") ?></td>
                                                    <td>Rp. <?= number_format($item['jumlah_bayar'], 0, ",", ".") ?></td>
                                                    <td style="display: none;">
                                                        <?php if($item['status'] == 'tertunda') {
                                                            echo '<span class="badge badge-warning">Tertunda</span>';
                                                        } else if($item['status'] == 'lunas') {
                                                            echo '<span class="badge badge-success">Lunas</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Batal</span>';
                                                        }?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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
    printWindow.document.write('@media print { body { font-family: Arial, sans-serif; }');
    printWindow.document.write('.header { text-align: center; margin-bottom: 20px; }');
    printWindow.document.write('.footer { text-align: center; margin-top: 20px; }');
    printWindow.document.write('.no-print { display: none; }'); // Menyembunyikan elemen yang tidak perlu
    printWindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; table-layout: fixed; }');
    printWindow.document.write('th, td { border: 1px solid #ddd; text-align: center; word-wrap: break-word; padding: 8px; }');
    printWindow.document.write('th { background-color: #f2f2f2; }');
    printWindow.document.write('@page { size: landscape; } }');
    printWindow.document.write('</style></head><body>');

    // Header
    printWindow.document.write('<div style="margin-bottom:3rem;text-align:center;">');
    printWindow.document.write('<h1 style="margin:0; padding:0;">CV. Samudera Abadi</h1>');
    printWindow.document.write('<p style="margin:0; padding:0;">Jl. Pangeran Hidayat Paal Lima Perm. Taman Tamarona Blok C 14 Kota Baru, Kota Jambi</p>');
    printWindow.document.write('<p style="margin:0; padding:0;">Telepon. 0022-7005-0707 - Bu Siti Hardina</p>');
    printWindow.document.write('</div>');

    // Laporan
    printWindow.document.write('<h2 style="text-align: center;">Laporan Penjualan</h2>');

    // Tabel Laporan
    printWindow.document.write(document.querySelector('#print-table').outerHTML);

    // Footer
    printWindow.document.write('<div style="text-align: right; margin-top: 4rem;">');
    printWindow.document.write('<p style="margin-bottom:3rem; text-align: right;">Admin,</p>');
    printWindow.document.write('<p style="margin-top:3rem;">____________</p>');
    printWindow.document.write('</div>');

    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.onafterprint = function() {
        // Kembalikan ID tabel ke semula
        table.id = originalId;
        printWindow.close();
        // window.location.href = '/admin/transaksi/list'; // Kembali ke halaman awal setelah print
    };
}

document.querySelector('.btn-warning').addEventListener('click', function(event) {
    event.preventDefault();
    printReport();
});

    </script>