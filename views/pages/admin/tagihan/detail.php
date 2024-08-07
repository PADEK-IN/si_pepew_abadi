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
                    <a href="/admin/tagihan">
                        Tagihan
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <b>Detail Tagihan</b>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Detail Tagihan #<?= $detailTagihan['id_pesanan'] ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="col">
                                            <!-- foto Bukti -->
                                            <div class="my-4">
                                            <?php if($detailTagihan['bukti_bayar'] !== null) {
                                                echo '<img src="/assets/img/barang/' . $detailTagihan['bukti_bayar'] . '"  alt="..." class="avatar-img rounded" style="max-width: 50%; height: auto; margin: 0 auto; object-fit: cover;">';
                                            } else {
                                                echo '<span class="badge badge-danger">Belum Upload</span>';
                                            }?>
                                            </div>
                                            <!-- status transaksi -->
                                            <div class="my-4">
                                                <?php if($detailTagihan['isValid']): ?>
                                                    <span class="alert alert-success">Bukti Valid</span>
                                                <?php else: ?>
                                                    <span class="alert alert-warning">Bukti Belum Valid</span>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                            <table class="table table-striped">
                                                <?php foreach($detailTagihan['item_pesanan'] as $item_pesanan): ?>
                                                <tr>
                                                    <td><i class="bi bi-menu-button"></i><?= $item_pesanan['barang']['nama'] ?></td>
                                                    <td><i class="bi bi-bucket"></i><?= $item_pesanan['jumlah'] ?> <?= $item_pesanan['barang']['satuan']?></td>
                                                    <td><i class="bi bi-tags"></i>Rp. <?= number_format($item_pesanan['barang']['harga'], 2, ',', '.') ?></td>
                                                </tr>
                                                <?php endforeach ?>
                                                <tr>
                                                    <th colspan="2">Total</th>
                                                    <td><i class="bi bi-tags"></i>Rp. <?= number_format($detailTagihan['pesanan']['total']-$detailTagihan['pesanan']['ppn'], 2, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">PPN 11%</th>
                                                    <td><i class="bi bi-tags"></i>Rp. <?= number_format($detailTagihan['pesanan']['ppn'], 2, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Net</th>
                                                    <td class="text-primary"><i class="bi bi-tags"></i>Rp. <?= number_format($detailTagihan['pesanan']['total'], 2, ',', '.') ?></td>
                                                </tr>
                                            </table>
                                            <div class="content">
                                                <p>Metode Pembayaran: 
                                                    <?php if($detailTagihan['metode_bayar'] == 'cod') {
                                                        echo '<span class="badge badge-success">COD</span>';
                                                    } else if($detailTagihan['metode_bayar'] == 'transfer') {
                                                        echo '<span class="badge badge-primary">Transfer</span>';
                                                    }?>
                                                </p>
                                                <p>Metode Pengiriman: 
                                                    <?php if($detailTagihan['pesanan']['metode_kirim'] == 'diantar') {
                                                        echo '<span class="badge badge-success">Diantar</span>';
                                                    } else {
                                                        echo '<span class="badge badge-primary">Dijemput</span>';
                                                    }?>
                                                </p>
                                                <p>Status Pembayaran: 
                                                    <?php if($detailTagihan['status'] == 'tertunda') {
                                                        echo '<span class="badge badge-warning">Tertunda</span>';
                                                    } else if($detailTagihan['status'] == 'lunas') {
                                                        echo '<span class="badge badge-success">Lunas</span>';
                                                    } else {
                                                        echo '<span class="badge badge-danger">Batal</span>';
                                                    }?>
                                                </p>
                                            </div>
                                            <hr>
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