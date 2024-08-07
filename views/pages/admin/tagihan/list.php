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
                    <b>Tagihan</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">List Tagihan</h4>
                        <div>
                            <a class="btn btn-sm btn-warning btn-round ms-auto" href="">
                                <i class="fas fa-file-alt"></i>
                                Print
                            </a>
                            <a class="btn btn-sm btn-primary btn-round ms-auto" href="/admin/tagihan-validasi-list">
                                <i class="fas fa-file-import"></i>
                                Request Validasi
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pesanan</th>
                                        <th>Pemesan</th>
                                        <th>Methode Pembayaran</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Status</th>
                                        <th>Bukti Bayar</th>
                                        <th>Keterangan Bukti</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pesanan</th>
                                        <th>Pemesan</th>
                                        <th>Methode Pembayaran</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Status</th>
                                        <th>Bukti Bayar</th>
                                        <th>Keterangan Bukti</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($listTagihan as $index => $item): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td>
                                                <a href="/admin/tagihan/<?php echo $item['id']; ?>"><?php echo $item['id_pesanan']; ?></a>
                                            </td>
                                            <td>
                                                <?= $item['pelanggan']['nama'] ?>
                                            </td>
                                            <td>
                                                <?php if($item['metode_bayar'] == 'cod') {
                                                    echo '<span class="badge badge-success">COD</span>';
                                                } else if($item['metode_bayar'] == 'transfer') {
                                                    echo '<span class="badge badge-primary">Transfer</span>';
                                                }?>
                                            </td>
                                            <td>Rp. <?= $item['jumlah_bayar'] ?></td>
                                            <td>
                                                <?php if($item['status'] == 'tertunda') {
                                                    echo '<span class="badge badge-warning">Tertunda</span>';
                                                } else if($item['status'] == 'lunas') {
                                                    echo '<span class="badge badge-success">Lunas</span>';
                                                } else {
                                                    echo '<span class="badge badge-danger">Batal</span>';
                                                }?>
                                            </td>
                                            <td>
                                                <?php if($item['bukti_bayar'] !== null) {
                                                    echo '<img src="/assets/img/barang/' . $item['bukti_bayar'] . '" alt="barang1" width="50px">';
                                                } else {
                                                    echo '<span class="badge badge-danger">Belum Upload</span>';
                                                }?>
                                            </td>
                                            <td>
                                                <?php if($item['isValid'] == '1') {
                                                    echo '<span class="badge badge-success">Valid</span>';
                                                } else {
                                                    echo '<span class="badge badge-warning">Tidak Valid</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
