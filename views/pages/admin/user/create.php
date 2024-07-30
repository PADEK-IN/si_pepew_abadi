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
                    <a href="/admin/anggota">Karyawan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Tambah Karyawan</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Buat Karyawan Baru</h4>
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
                                    <small id="nama" class="form-text text-muted text-success">Silahkan Masukan Nama Pengguna</small>
                                </div>
                                <!-- password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password"/>
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
                                    <button class="btn btn-success">Buat</button>
                                    <a href="/admin/anggota" class="btn btn-danger">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
