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
                    <b>Pengiriman</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">List Pengiriman</h4>
                        <a class="btn btn-sm btn-warning btn-round ms-auto" href="">
                            <i class="fas fa-file-alt"></i>
                            Print
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penerima</th>
                                        <th>ID Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Alamat</th>
                                        <!-- <th>Bukti</th> -->
                                        <th>Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($pengiriman == 0) { ?>
                                        <tr>
                                            <td colspan="7">Data pengiriman Masih Koosong</td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php foreach ($pengiriman as $index => $item): ?>
                                            <tr>
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo $item['pelanggan']['nama']; ?></td>
                                                <td><?php echo $item['id_pesanan']; ?></td>
                                                <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['alamat']; ?></td>
                                                <!-- <td>
                                                    <?php if($item['bukti'] == null) {?>
                                                        <span class="badge badge-danger">---</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Fotonya</span>
                                                    <?php } ?>
                                                </td> -->
                                                <td>
                                                    <?php if($item['status'] == 'terkirim') {?>
                                                        <span class="badge badge-success">Terkirim</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-warning">Diproses</span>
                                                    <?php } ?>
                                                </td>
                                                <!-- <td>
                                                    <?php if($item['status'] == 'diproses') {?>
                                                        <a href="/admin/pengiriman/<?= $item['id'] ?>/edit" class="btn btn-sm btn-primary">Validate</a>
                                                    <?php } else { ?>
                                                        <span class="badge badge-secondary">---</span>
                                                    <?php } ?>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
