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
                    <b>Admin</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Daftar List Admin</h4>
                        <div>
                        <a class="btn btn-sm btn-warning btn-round ms-auto" href="">
                                <i class="fas fa-file-alt"></i>
                                Print
                            </a>
                            <a class="btn btn-sm btn-primary btn-round ms-auto" href="/admin/create/admin">
                                <i class="fa fa-plus"></i>
                                Tambah Admin
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($adminUser as $index => $item): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td>
                                                <a href=""><?php echo $item['nama']; ?></a>
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
                                            <td>
                                                <a href="/admin/edit/admin/<?php echo $item['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <button 
                                                    type="button" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="deleteAdmin('<?php echo $item['id']; ?>','<?php echo $item['nama']; ?>')">
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
    function deleteAdmin(id, name) {
        swal({
            title: `Yakin ingin menghapus Admin ${name}?`,
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "Confirm"
            },
            dangerMode: true
        }).then((willDelete) => {
            // if (willDelete) {
            //     window.location.href = `/admin/admin/delete/${id}`;
            // }
        });
    }
</script>