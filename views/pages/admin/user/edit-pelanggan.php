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
                    <a href="/admin/pelanggan-list">Pelanggan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Edit Pelanggan</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Form Edit Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 col-lg-6">
                            <form action="/admin/pelanggan/update/<?= $pelangganUser['id'] ?>" method="post" enctype="multipart/form-data">

                                <!-- nama -->
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $pelangganUser['nama'] ?>" required/>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukan Email" value="<?= $pelangganUser['email'] ?>" required readonly />
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Email Admin</small>
                                </div>

                                <!-- foto -->
                                <div class="form-group">
                                    <label for="foto">Foto Profile</label><br>
                                    <img src="/assets/img/profile/<?= $pelangganUser['foto']?>" alt="foto" width="70px">
                                    <input type="file" class="form-control-file" name="foto" id="fotoProfile"/><br>
                                    <small id="foto" class="form-text text-muted text-success">Silahkan Masukan Foto Profile</small>
                                </div>

                                <!-- select kelamin -->
                                <div class="form-group">
                                    <label for="jenis-kelamin" >Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" value="" required>
                                        <option>Pilih Jenis Kelamin</option>
                                        <option value="laki-laki" <?= $pelangganUser['jenis_kelamin']==='laki-laki'?'selected':'' ?>>Laki-laki</option>
                                        <option value="perempuan" <?= $pelangganUser['jenis_kelamin']==='perempuan'?'selected':'' ?>>Perempuan</option>
                                    </select>
                                </div>

                                <!-- alamat -->
                                <div class="form-group">
                                    <label for="nama">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control" value="<?= $pelangganUser['alamat'] ?>" required>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Alamat Admin</small>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="form-group">
                                    <label for="nama">Nomor Telepon</label>
                                    <input type="number" name="no_telp" class="form-control" value="<?= $pelangganUser['no_telp'] ?>" required>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Nomot Telepon Admin</small>
                                </div>

                                <!-- kota -->
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" name="kota" class="form-control" placeholder="kota" value="<?= $pelangganUser['kota'] ?>"/>
                                </div>

                                <!-- kode pos -->
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="number" name="kode_pos" class="form-control" placeholder="kode_pos" value="<?= $pelangganUser['kode_pos'] ?>"/>
                                </div>

                                <!-- Pekerjaan -->
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" placeholder="pekerjaan" value="<?= $pelangganUser['pekerjaan'] ?>"/>
                                </div>

                                <!-- Perusahaan -->
                                <div class="form-group">
                                    <label for="perusahaan">Perusahaan</label>
                                    <input type="text" name="perusahaan" class="form-control" placeholder="perusahaan" value="<?= $pelangganUser['perusahaan'] ?>" />
                                </div>

                                <!-- NPWP -->
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input type="text" name="npwp" class="form-control" placeholder="npwp" value="<?= $pelangganUser['npwp'] ?>" />
                                </div>

                                <!-- button -->
                                <div class="card-action">
                                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                                    <a href="/admin/admin-list" class="btn btn-sm btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
