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
