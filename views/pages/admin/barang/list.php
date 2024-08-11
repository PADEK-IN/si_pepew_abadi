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
                        <b>Barang</b>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Daftar List Barang</h4>
                            <div>
                                <a class="btn btn-sm btn-success btn-round ms-auto" href="/admin/kategori">
                                    <i class="fas fa-bars"></i>
                                    Kategori
                                </a>
                                <a class="btn btn-sm btn-warning btn-round ms-auto no-print" href="#" onclick="printReport()">
                                    <i class="fas fa-file-alt"></i>
                                    Print
                                </a>
                                <a class="btn btn-primary btn-sm btn-round ms-auto" href="/admin/barang/create">
                                    <i class="fa fa-plus"></i>
                                    Tambah Barang
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="tabel">
                                <table id="multi-filter-select" class="display table table-striped border-1 table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Image</th>
                                            <th class="action-column no-print">Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot class="no-print">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Image</th>
                                            <th class="action-column no-print">Action</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php if (isset($barang) && (is_iterable($barang) || is_object($barang))): ?>
                                            <?php foreach ($barang as $index => $item): ?>
                                            <tr>
                                                <td><?php echo $index + 1; ?></td>
                                                <td><a href="/admin/barang/detail/<?php echo $item['id']; ?>"><?php echo $item['nama']; ?></a></td>
                                                <td><?php echo $item['kategori_nama']; ?></td>
                                                <td>Rp. <?= number_format($item['harga'], 2, ',', '.'); ?></td>
                                                <td><?php echo htmlspecialchars($item['stok']);  ?></td>
                                                <td>
                                                    <img src="/assets/img/barang/<?php echo $item['gambar']; ?>" alt="barang1" width="50px">
                                                </td>
                                                <td class="action-column no-print">
                                                    <a href="/admin/barang/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-warning m-1">Edit</a>
                                                    <button 
                                                    type="button" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="deleteBarang('<?php echo $item['id']; ?>','<?php echo $item['nama']; ?>')">
                                                        Hapus
                                                    </button>
                                                    <!-- tambah stok -->
                                                    <button href="" class="btn btn-sm btn-success m-1"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    data-bs-id="<?php echo $item['id']; ?>"
                                                    data-bs-nama="<?php echo $item['kategori_nama']; ?>"
                                                    data-bs-stok="<?php echo $item['stok']; ?>"
                                                    >
                                                        Tambah Stok
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="" method="post" id="edit-Form">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Stok Barang <span id="name"></span></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="stok" class="col-form-label">Jumlah Stok yang akan ditambahkan:</label>
                                                <input type="number" class="form-control" id="stok" placeholder="...">
                                                <small id="satuan" class="form-text text-muted text-success">
                                                    Stok Barang Saat Ini berjumlah: <span class="text-black">0</span> Buah
                                                </small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="totalStok" class="col-form-label">Total Jumlah Stok:</label>
                                                <input type="number" name="stok" class="form-control" id="totalStok" placeholder="..." readonly>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function printReport() {
            const wrapper = document.getElementById('multi-filter-select_wrapper');

            if (wrapper) {
                // Ambil semua elemen child dari wrapper
                const children = wrapper.children;

                // Periksa apakah ada child elements
                if (children.length > 0) {
                    // Tambahkan class 'no-print' pada child pertama
                    children[0].classList.add('no-print');

                    // Tambahkan class 'no-print' pada child terakhir
                    children[children.length - 1].classList.add('no-print');
                }
            }
        
            
            var printWindow = window.open('', '', 'height=800,width=1200');
            printWindow.document.write('<html><head><title>Print Report</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('body { font-family: Arial, sans-serif; }');
            printWindow.document.write('.header { text-align: center; margin-bottom: 20px; }');
            printWindow.document.write('.footer { text-align: center; margin-top: 20px; }');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; }');
            printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }');
            printWindow.document.write('th { background-color: #f2f2f2; }');
            printWindow.document.write('@media print { .no-print { display: none; } }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            
            // Header
            printWindow.document.write('<div class="header">');
            printWindow.document.write('<h1>CV. Samudera Abadi</h1>');
            printWindow.document.write('<p>Jl. Pangeran Hidayat Paal Lima Perm. Taman Tamarona Blok C 14 Kota Baru, Kota Jambi</p>');
            printWindow.document.write('<p>Telepon. 0022-7005-0707 - Bu Siti Hardina</p>');
            printWindow.document.write('</div>');
            
            // Laporan
            printWindow.document.write('<h2 style="text-align: center;">Laporan Barang</h2>');
            
            // Tabel Laporan
            printWindow.document.write(document.querySelector('.table-responsive').innerHTML);
            
            // Tanda Tangan
            printWindow.document.write('<div style="text-align: right; margin-top: 4rem;>');
            printWindow.document.write('<p style="margin-bottom:3rem; text-align: center;">Admin,</p>');
            printWindow.document.write('<p style="margin-top:3rem;">____________</p>');
            printWindow.document.write('</div>');
            
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
                // window.location.href = '/admin/barang'; // Kembali ke halaman awal setelah print
            };
        }

        document.querySelector('.btn-warning').addEventListener('click', function(event) {
            event.preventDefault();
            printReport();
        });

        let editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            let button = event.relatedTarget;

            let id = button.getAttribute('data-bs-id');
            let name = button.getAttribute('data-bs-nama');
            let currentStok = parseInt(button.getAttribute('data-bs-stok')); // Convert to integer

            let modalTitle = this.querySelector('.modal-title #name');
            let modalInputStok = this.querySelector('.modal-body #stok');
            let modalCurrentStock = this.querySelector('.modal-body #satuan span');
            let modalTotalStock = this.querySelector('.modal-body #totalStok');

            modalTitle.textContent = name; // Update the title with the item name
            modalInputStok.value = ''; // Reset the input for the new stock
            modalCurrentStock.textContent = currentStok; // Update the current stock display
            modalTotalStock.value = currentStok; // Initialize the total stock with current stock

            // Event listener for input changes
            modalInputStok.addEventListener('input', function () {
                let addedStok = parseInt(modalInputStok.value) || 0; // Get the added stock

                // Validate the input: must be greater than 0
                if (addedStok < 1) {
                    modalInputStok.value = ''; // Clear invalid input
                    alert("Jumlah stok harus lebih besar dari 0!"); // Feedback message
                    return;
                }

                modalTotalStock.value = currentStok + addedStok; // Update total stock
            });

            const form = document.getElementById('edit-Form');
            form.action = `/admin/barang/stok/${id}`;
        });

        function deleteBarang(id, name) {
            swal({
                title: `Yakin ingin menghapus barang ${name}?`,
                icon: "warning",
                buttons: {
                    cancel: "Cancel",
                    confirm: "Confirm"
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = `/admin/barang/delete/${id}`;
                }
            });
        }
    </script>