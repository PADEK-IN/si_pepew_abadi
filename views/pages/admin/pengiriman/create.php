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
                    <a href="/admin/tagihan">Tagihan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Buat Pengiriman</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Buat Pengiriman Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 col-lg-6">
                            <form action="/admin/pengiriman/store" method="post" enctype="multipart/form-data">
                                
                                <!-- nama -->
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control" value="<?= $tagihan['pelanggan']['nama']?>" readonly/>
                                    <input type="text" class="form-control" name="id_pesanan" id="id_pesanan" value="<?= $tagihan['id_pesanan']?>" hidden readonly/>
                                </div>

                                <!-- tanggal -->
                                <div class="form-group">
                                    <label for="satuan">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder=""/>
                                    <small id="satuan" class="form-text text-muted text-success">Silahkan Masukan Tanggal Pengiriman</small>
                                </div>


                                <!-- alamat -->
                                <div class="form-group">
                                    <label for="deskripsi">Alamat Pengiriman</label>
                                    <textarea class="form-control" name="alamat" id="deskripsi" readonly><?= $tagihan['pelanggan']['alamat']?></textarea>
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
