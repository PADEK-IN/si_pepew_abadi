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
                    <b>Detail Barang</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Detail Barang</h4>
                        <a class="btn btn-primary btn-round ms-auto" href="/admin/barang/edit/<?= $barang['id'] ?>">
                        <i class="fas fa-pen mr-2"></i>
                            Edit Barang
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="">
                                            <img src="/assets/img/barang/<?= $barang['gambar'] ?>" alt="gambar_barang" class="avatar-img rounded-circle" style="max-width: 50%; height: auto; margin: 0 auto; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>Nama Barang</td>
                                                <td><b><?= $barang['nama'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Kategori Barang</td>
                                                <td><b><?= $barang['kategori_nama'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Satuan Barang</td>
                                                <td><b><?= $barang['satuan'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Berat Barang</td>
                                                <td><b><?= $barang['berat'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td>Rp. <?= number_format($barang['harga'], 2, ',', '.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Stok Barang</td>
                                                <td><b><?= $barang['stok'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td><?= $barang['deskripsi'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>