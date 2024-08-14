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
                    <a href="/admin/barang">
                        Barang
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Ketegori</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Daftar Ketegori</h4>
                        <div>
                            <button type="button" 
                            class="btn btn-primary btn-sm btn-round ms-auto" 
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fa fa-plus"></i>
                                Tambah Ketegori
                            </button>
                            <!-- Modal Tambah -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="/admin/kategori/create" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Nama:</label>
                                                    <input type="text" name="nama" class="form-control" id="recipient-name">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <!-- <th>Jumlah Barang</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <!-- <th>Jumlah Barang</th> -->
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($kategori as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $value['nama']; ?></td>
                                            <!-- <td><?php echo $value['jumlah_barang']; ?> - Barang</td> -->
                                            <td>
                                                <button href="" class="btn btn-sm btn-warning m-1"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-bs-id-kategori="<?php echo $value['id']; ?>"
                                                data-bs-nama-kategori="<?php echo $value['nama']; ?>"
                                                >
                                                Edit
                                            </button>
                                                <button 
                                                type="button" 
                                                class="btn btn-sm btn-danger" 
                                                onclick="deleteKategori('<?php echo $value['id']; ?>','<?php echo $value['nama']; ?>')">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="/admin/kategori/create" method="post" id="delete-form">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Nama:</label>
                                            <input type="text" name="nama" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget

        let id = button.getAttribute('data-bs-id-kategori')
        let nama = button.getAttribute('data-bs-nama-kategori')
        let modalInputNama = this.querySelector('.modal-body #name')

        modalInputNama.value = nama

        const form = document.getElementById('delete-form');
        form.action = `/admin/kategori/update/${id}`;
    })

    function deleteKategori($id, $name) {
        swal({
            title: "Yakin ingin menghapus kategori?",
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "Confirm"
            },
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = `/admin/kategori/delete/${$id}`;
            }
        });
    }
</script>
