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
                    <a href="/admin/admin-list">admin</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Detail admin</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Detail admin</h4>
                        <a class="btn btn-sm btn-warning btn-round ms-auto" href="/admin/edit/admin/<?php echo $admin['id']; ?>">
                            Edit User
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row row-demo-grid">

                            <div class="col-6 col-md-4">
                                <div class="card ">
                                    <div class="card-body rounded-4">
                                        <img src="/assets/img/profile/<?php echo $admin['foto']; ?>" class="avatar-img rounded-4" alt="foto">
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
                                                <p><?= $admin['nama'] ?></p>
                                            </div>
                                        </div>

                                        <!-- email -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $admin['email'] ?></p>
                                            </div>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Jenis Kelamin</p>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if($admin['jenis_kelamin'] == 'laki-laki') { ?>
                                                    <p class="badge bg-primary"><?= $admin['jenis_kelamin'] ?></p>
                                                <?php } else { ?>
                                                    <p class="badge bg-success"><?= $admin['jenis_kelamin'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- alamat -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $admin['alamat'] ?></p>
                                            </div>
                                        </div>

                                        <!-- Nomor Telepon -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Nomor Telepon</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?= $admin['no_telp'] ?></p>
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
