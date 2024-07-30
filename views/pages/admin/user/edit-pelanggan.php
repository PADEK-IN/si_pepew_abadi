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
                            <form action="">

                                <!-- username -->
                                <div class="form-group">
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username"/>
                                    </div>
                                </div>
                                
                                <!-- nama -->
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama"/>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Nama Pengguna Yang Baru</small>
                                </div>
                                <!-- password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password"/>
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Password Yang Baru</small>
                                </div>

                                <!-- select role -->
                                <div class="form-group">
                                    <label for="role" >Role</label>
                                    <select class="form-select" id="role">
                                        <option>Admin</option>
                                        <option>Pelanggan</option>
                                    </select>
                                </div>
                                <!-- button -->
                                <div class="card-action">
                                    <button class="btn btn-sm btn-success">Ubah</button>
                                    <a href="/admin/pelanggan-list" class="btn btn-sm btn-danger">Kembali</a href="/admin/anggota">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
