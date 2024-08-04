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
                    <b>Detail Pelanggan</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Detail Pelanggan</h4>
                        <a class="btn btn-sm btn-warning btn-round ms-auto" href="/admin/edit/pelanggan/<?php echo $pelanggan['id']; ?>">
                            Edit User
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row row-demo-grid">

                            <div class="col-6 col-md-4">
                                <div class="card ">
                                    <div class="card-body rounded-4">
                                        <img src="/assets/img/profile/<?php echo $pelanggan['foto']; ?>" class="avatar-img rounded-4" alt="foto">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-8">
                                <div class="card m-4">

                                        <!-- nama -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Nama</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $pelanggan['nama'] ?></p>
                                            </div>
                                        </div>

                                        <!-- email -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $pelanggan['email'] ?></p>
                                            </div>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Jenis Kelamin</p>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if($pelanggan['jenis_kelamin'] == 'laki-laki') { ?>
                                                    <p class="badge bg-primary"><?= $pelanggan['jenis_kelamin'] ?></p>
                                                <?php } else { ?>
                                                    <p class="badge bg-success"><?= $pelanggan['jenis_kelamin'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- alamat -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $pelanggan['alamat'] ?></p>
                                            </div>
                                        </div>

                                        <!-- Nomor Telepon -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Nomor Telepon</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $pelanggan['no_telp'] ?></p>
                                            </div>
                                        </div>

                                        <!-- kota -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Kota</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= !empty($pelanggan['kota']) ? $pelanggan['kota'] : '---' ?></p>
                                            </div>
                                        </div>

                                        <!-- kode pos -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Kode Pos</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= !empty($pelanggan['kode_pos']) ? $pelanggan['kode_pos'] : '---' ?></p>
                                            </div>
                                        </div>

                                        <!-- pekerjaan -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Pekerjaan</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= !empty($pelanggan['pekerjaan']) ? $pelanggan['pekerjaan'] : '---' ?></p>
                                            </div>
                                        </div>

                                        <!-- perusahaan -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Perusahaan</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= !empty($pelanggan['perusahaan']) ? $pelanggan['perusahaan'] : '---' ?></p>
                                            </div>
                                        </div>

                                        <!-- perusahaan -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Perusahaan</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= !empty($pelanggan['npwp']) ? $pelanggan['npwp'] : '---' ?></p>
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
</div>
