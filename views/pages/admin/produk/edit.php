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
                    <a href="/admin/produk">Barang</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Edit Barang</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Form Edit Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 col-lg-6">
                            <form action="">
                                
                                <!-- nama -->
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Barang"/>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Nama Barang</small>
                                </div>

                                <!-- Kategori -->
                                <div class="form-group">
                                    <label for="defaultSelect">Kategori</label>
                                    <select
                                        class="form-select form-control"
                                        id="defaultSelect">
                                        <option value="">Pupuk</option>
                                        <option value="">Racun- Tanaman</option>
                                        <option value="">Mesin</option>
                                    </select>
                                </div>

                                <!-- harga -->
                                <div class="form-group">
                                    <label for="harga">Harga Barang</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp</span >
                                        <input type="number" class="form-control" placeholder="100.000" aria-label="harga" aria-describedby="basic-addon1"/>
                                    </div>
                                    <small id="harga" class="form-text text-muted text-success">Silahkan Masukan Harga Barang</small>
                                </div>

                                <!-- foto -->
                                <div class="form-group">
                                    <label for="foto">Foto Barang</label><br>
                                    <input type="file" class="form-control-file" id="fotoBarang"/><br>
                                    <small id="harga" class="form-text text-muted text-success">Silahkan Masukan Foto Barang</small>
                                </div>

                                <!-- desckripsi -->
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Barang</label>
                                    <textarea class="form-control" id="deskripsi" rows="5">
                                    </textarea>
                                </div>

                                <!-- button -->
                                <div class="card-action">
                                    <button class="btn btn-sm btn-success">Ubah</button>
                                    <a href="/admin/produk" class="btn btn-sm btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
