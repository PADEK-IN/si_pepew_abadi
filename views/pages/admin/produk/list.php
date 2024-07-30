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
                            <a class="btn btn-sm btn-warning btn-round ms-auto" href="">
                                <i class="fas fa-file-alt"></i>
                                Print
                            </a>
                            <a class="btn btn-sm btn-success btn-round ms-auto" href="">
                                <i class="fas fa-bars"></i>
                                Kategori
                            </a>
                            <a class="btn btn-primary btn-sm btn-round ms-auto" href="/admin/produk/tambah">
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
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <a href="/admin/produk/detail">5FGH432H</a>
                                        </td>
                                        <td>Sarung Bantal</td>
                                        <td>Pupuk</td>
                                        <td>Rp. 20.000</td>
                                        <td>
                                            <img src="../../assets/auth/img/register.jpg" alt="produk1" width="100px">
                                        </td>
                                        <td>
                                            <a href="/admin/produk/edit" class="btn btn-sm btn-warning m-1">Edit</a>
                                            <button 
                                            type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmDeleteUser(this, 'Ingin Menghapus Barang 2 ini!')">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <a href="/admin/produk/detail">5FGH432H</a>
                                        </td>
                                        <td>Sarung Bantal</td>
                                        <td>Racun Tanaman</td>
                                        <td>Rp. 20.000</td>
                                        <td>
                                            <img src="../../assets/auth/img/register.jpg" alt="produk1" width="100px">
                                        </td>
                                        <td>
                                            <a href="/admin/produk/edit" class="btn btn-sm btn-warning m-1">Edit</a>
                                            <button 
                                            type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmDeleteUser(this, 'Ingin Menghapus Barang 2 ini!')">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
