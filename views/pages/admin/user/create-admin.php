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
                    <a href="/admin/admin-list">Admin</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Tambah Admin</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Buat Admin Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 col-lg-6">
                            <form action="/admin/admin/store" method="post" role="form">

                                <!-- nama -->
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required/>
                                    </div>
                                </div>
                                
                                <!-- email -->
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukan Email" required />
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Email Admin</small>
                                </div>

                                <!-- password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                </div>

                                <!-- select kelamin -->
                                <div class="form-group">
                                    <label for="jenis-kelamin" >Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option>Pilih Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <!-- alamat -->
                                <div class="form-group">
                                    <label for="nama">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control" required>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Alamat Admin</small>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="form-group">
                                    <label for="nama">Nomor Telepon</label>
                                    <input type="number" name="no_telp" class="form-control" required>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Nomot Telepon Admin</small>
                                </div>

                                <!-- button -->
                                <div class="card-action">
                                    <button type="submit" class="btn btn-sm btn-success">Buat</button>
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
