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
                            <a class="btn btn-primary btn-sm btn-round ms-auto" href="/admin/barang/create">
                            <i class="fa fa-plus"></i>
                                Tambah Barang
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
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
                                            <td>
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
