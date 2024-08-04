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
                            <a class="btn btn-sm btn-warning btn-round ms-auto" href="">
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
                                        <th>Nomor Handphone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor Handphone</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($pelangganUser as $index => $item): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td>
                                            <a href=""><?php echo $item['nama']; ?></a>
                                        </td>
                                        <td><?php echo $item['email']; ?></td>
                                        <td><?php echo $item['no_telp']; ?></td>
                                        <td>
                                            <a href="/admin/edit/pelanggan" class="btn btn-sm btn-warning">Edit</a>
                                            <button 
                                            type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="deletePengguna('<?php echo $item['id']; ?>','<?php echo $item['nama']; ?>')">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
    function deletePengguna(id, name) {
        swal({
            title: `Yakin ingin menghapus akun ${name}?`,
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "Confirm"
            },
            dangerMode: true
        }).then((willDelete) => {
            // if (willDelete) {
            //     window.location.href = `/admin/barang/delete/${id}`;
            // }
        });
    }
</script>