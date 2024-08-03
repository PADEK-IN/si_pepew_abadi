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
                    <a href="/admin/barang">Barang</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Tambah Barang</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Buat Barang Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 col-lg-6">
                            <form action="/admin/barang/store" method="post" enctype="multipart/form-data">
                                
                                <!-- nama -->
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Barang"/>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Nama Barang</small>
                                </div>

                                 <!-- satuan -->
                                 <div class="form-group">
                                    <label for="satuan">Satuan Barang</label>
                                    <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukan Satuan Barang"/>
                                    <small id="satuan" class="form-text text-muted text-success">Silahkan Masukan Satuan Barang</small>
                                </div>

                                 <!-- satuan -->
                                 <div class="form-group">
                                    <label for="berat">Berat Barang</label>
                                    <input type="number" class="form-control" name="berat" id="berat" placeholder="Masukan Berat Barang  (gram)"/>
                                    <small id="berat" class="form-text text-muted text-success">Silahkan Masukan Berat Barang</small>
                                </div>

                                 <!-- satuan -->
                                 <div class="form-group">
                                    <label for="stok">Stok Barang</label>
                                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukan Stok Barang"/>
                                    <small id="stok" class="form-text text-muted text-success">Silahkan Masukan Stok Barang</small>
                                </div>

                                <!-- Kategori -->
                                <div class="form-group">
                                    <label for="defaultSelect">Kategori</label>
                                    <select
                                        class="form-select form-control"
                                        id="defaultSelect"
                                        name="id_kategori">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $item): ?>
                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- harga -->
                                <div class="form-group">
                                    <label for="harga">Harga Barang</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp</span >
                                        <input type="number" name="harga" class="form-control" placeholder="100.000" aria-label="harga" aria-describedby="basic-addon1"/>
                                    </div>
                                    <small id="harga" class="form-text text-muted text-success">Silahkan Masukan Harga Barang</small>
                                </div>

                                <!-- foto -->
                                <div class="form-group">
                                    <label for="foto">Foto Barang</label><br>
                                    <input type="file" class="form-control-file" name="gambar" id="fotoBarang"/><br>
                                    <small id="harga" class="form-text text-muted text-success">Silahkan Masukan Foto Barang</small>
                                </div>

                                <!-- desckripsi -->
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Barang</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                </div>

                                <!-- button -->
                                <div class="card-action">
                                    <button type="submit" class="btn btn-sm btn-success">Buat</button>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="history.back()">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
