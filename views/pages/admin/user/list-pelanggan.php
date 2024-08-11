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
                    <b>Pelanggan</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Daftar List Pelanggan</h4>
                        <div>
                            <a class="btn btn-sm btn-warning btn-round ms-auto" href="" onclick="printReport()">
                                <i class="fas fa-file-alt"></i>
                                Print
                            </a>
                            <a class="btn btn-sm btn-primary btn-round ms-auto" href="/admin/create/pelanggan">
                                <i class="fa fa-plus"></i>
                                Tambah Pelanggan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor Handphone</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor Handphone</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                <?php if (isset($pelangganUser) && (is_iterable($pelangganUser) || is_object($pelangganUser))) : ?>
                                    <?php foreach ($pelangganUser as $index => $item): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td>
                                            <a href="/admin/pelanggan/detail/<?php echo $item['id']; ?>"><?php echo $item['nama']; ?></a>
                                        </td>
                                        <td><?php echo $item['email']; ?></td>
                                        <td>
                                            <?php if ($item['jenis_kelamin'] == 'laki-laki') {
                                                echo '<span class="badge badge-primary">Laki-Laki</span>';
                                            } else {
                                                echo '<span class="badge badge-success">Perempuan</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $item['no_telp']; ?></td>
                                        <td class="no-print">
                                            <a href="/admin/edit/pelanggan/<?php echo $item['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <button 
                                            type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="deletePelanggan('<?php echo $item['id']; ?>','<?php echo $item['nama']; ?>')">
                                                Hapus
                                            </button>
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
        function deletePelanggan(id, name) {
            swal({
                title: `Yakin ingin menghapus Pelanggan ${name}?`,
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "Confirm"
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = `/admin/pelanggan/delete/${id}`;
                }
            });
        }

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
            printWindow.document.write('<h2 style="text-align: center;">Laporan Data Pelanggan</h2>');
            
            // Tabel Laporan
            printWindow.document.write(document.querySelector('#print-table').outerHTML);
            
            // Footer
            printWindow.document.write('<div style="text-align: right; margin-top: 4rem;>');
            printWindow.document.write('<p style="margin-bottom:3rem; text-align: center;">Admin,</p>');
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
                // window.location.href = '/admin'; // Kembali ke halaman awal setelah print
            };
        }

        document.querySelector('.btn-warning').addEventListener('click', function(event) {
            event.preventDefault();
            printReport();
        });
    </script>