<main class="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Tagihan</h2>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                <li>Tagihan</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-12">
                        <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                            <?php if(isset($detailTagihan) && (is_iterable($detailTagihan) || is_object($detailTagihan))): ?>
                                <?php foreach($detailTagihan as $tagihan): ?>
                                    <div class="accordion-item">
                                        <div class="accordion-header">
                                            <h3 class="accordion-header">
                                                <button class="accordion-button collapsed d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#tagihan-<?= $tagihan['id'] ?>">
                                                    <span>
                                                        <?php if ($tagihan['isValid']): ?>
                                                            <?php if ($tagihan['pesanan']['metode_kirim']=='diantar'): ?>
                                                                <?php if (isset($tagihan['pengiriman']['status']) && $tagihan['pengiriman']['status']=='terkirim'): ?>
                                                                    <i class="bi bi-check-circle m-3"></i>
                                                                <?php else: ?>
                                                                    <i class="bi bi-dash-circle m-3"></i>
                                                                <?php endif ?>
                                                            <?php else: ?>
                                                                <i class="bi bi-check-circle m-3"></i>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <?php if ($tagihan['pesanan']['metode_kirim']=='diantar'): ?>
                                                                <?php if (isset($tagihan['pengiriman']['status']) && $tagihan['pengiriman']['status']=='terkirim'): ?>
                                                                    <i class="bi bi-dash-circle m-3"></i>
                                                                <?php else: ?>
                                                                    <i class="bi bi-x-circle m-3"></i>
                                                                <?php endif ?>
                                                            <?php else: ?> 
                                                                <i class="bi bi-x-circle m-3"></i>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                        Tagihan #<?= $tagihan['id'] ?><?= $tagihan['id_pesanan'] ?>
                                                    </span>
                                                    <span><?= number_format($tagihan['pesanan']['total'], 2, ',', '.') ?></span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="tagihan-<?= $tagihan['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                            <div class="accordion-body d-flex align-items-center">
                                                <div class="col-lg-4 text-center">
                                                    <!-- <img src="/assets/img/product/pupuk.jpeg" class="m-5" style="width: 100px;" alt="">
                                                    <br> -->
                                                    <?php if($tagihan['isValid']): ?>
                                                        <span class="alert alert-success">Pembayaran Valid</span>
                                                    <?php else: ?>
                                                        <span class="alert alert-warning">Pembayaran Belum Valid</span>
                                                    <?php endif ?>
                                                </div>
                                                <div class="col-lg-8">
                                                    <table class="table">
                                                        <?php foreach($tagihan['item_pesanan'] as $item_pesanan): ?>
                                                        <tr>
                                                            <td><i class="bi bi-menu-button"></i><?= $item_pesanan['barang']['nama'] ?></td>
                                                            <td><i class="bi bi-bucket"></i><?= $item_pesanan['jumlah'] ?> <?= $item_pesanan['barang']['satuan']?></td>
                                                            <td><i class="bi bi-tags"></i>Rp. <?= number_format($item_pesanan['barang']['harga'], 2, ',', '.') ?></td>
                                                        </tr>
                                                        <?php endforeach ?>
                                                        <tr>
                                                            <th colspan="2">Total</th>
                                                            <?php if($tagihan['pesanan']['metode_kirim']== 'diantar'): ?>
                                                                <td><i class="bi bi-tags"></i>Rp. <?= number_format($tagihan['pesanan']['total']-$tagihan['pesanan']['ppn']-$tagihan['pesanan']['ongkir'], 2, ',', '.') ?></td>
                                                            <?php else: ?>
                                                                <td><i class="bi bi-tags"></i>Rp. <?= number_format($tagihan['pesanan']['total']-$tagihan['pesanan']['ppn'], 2, ',', '.') ?></td>
                                                            <?php endif ?>
                                                        </tr>
                                                        <?php if($tagihan['pesanan']['metode_kirim']== 'diantar'): ?>   
                                                            <tr>
                                                                <th colspan="2">Ongkir</th>
                                                                <td><i class="bi bi-tags"></i>Rp. <?= number_format($tagihan['pesanan']['ongkir'], 2, ',', '.') ?></td>
                                                            </tr>
                                                        <?php endif ?>
                                                        <tr>
                                                            <th colspan="2">PPN 11%</th>
                                                            <td><i class="bi bi-tags"></i>Rp. <?= number_format($tagihan['pesanan']['ppn'], 2, ',', '.') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2">Net</th>
                                                            <td class="text-primary"><i class="bi bi-tags"></i>Rp. <?= number_format($tagihan['pesanan']['total'], 2, ',', '.') ?></td>
                                                        </tr>
                                                    </table>
                                                    <div class="content d-flex justify-content-between">
                                                        <div>
                                                            <p>Metode Pembayaran: <?= $tagihan['metode_bayar'] ?></p>
                                                            <p>Metode Pengiriman: <?= $tagihan['pesanan']['metode_kirim'] ?></p>
                                                            <?php if($tagihan['pesanan']['metode_kirim']== 'diantar'): ?>
                                                                <p>Status Tanggal Pengiriman: <?= isset($tagihan['pengiriman']['tanggal'])?$tagihan['pengiriman']['tanggal']:'-' ?></p>
                                                                <p>Status Status Pengiriman: <?= isset($tagihan['pengiriman']['status'])?$tagihan['pengiriman']['status']:'Belum diproses' ?></p>
                                                            <?php endif ?>
                                                            <p>Status Pembayaran: <?= $tagihan['status'] ?></p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <?php if($tagihan['pesanan']['metode_kirim']== 'diantar' && isset($tagihan['pengiriman']['status'])): ?>
                                                                <?php if($tagihan['pengiriman']['status']== 'diperjalanan'): ?>
                                                                <a href="/tagihan/terima-barang/<?= $tagihan['pengiriman']['id'] ?>" class="btn btn-sm btn-info">Terima Barang</a>    
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                </div>
            </div>
        </div>
    </section><!-- End Frequently Asked Questions Section -->

</main>