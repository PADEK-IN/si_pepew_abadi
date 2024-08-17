<main class="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Pesananku</h2>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                <li>Pesananku</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <table id="tableData" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="bg-info text-center">Tanggal</th>
                                <th class="bg-info text-center">ID Pesanan</th>
                                <th class="bg-info text-center">Status Bayar</th>
                                <th class="bg-info text-center">Metode Bayar</th>
                                <th class="bg-info text-center">Metode Kirim</th>
                                <th class="bg-info text-center">Sub Total</th>
                                <th class="bg-info text-center">PPN</th>
                                <th class="bg-info text-center">Total</th>
                                <th class="bg-info text-center">Status Pengiriman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detailPesanan as $pesanan): ?>
                            <tr class="text-center">
                                <td><?= date('d/m/Y', strtotime($pesanan['created_at'])) ?></td>
                                <td>#<?= $pesanan['id'] ?><?= $pesanan['id_pesanan'] ?></td>
                                <td><?= ucfirst($pesanan['status']) ?></td>
                                <td><?= strtoupper($pesanan['metode_bayar'])=="COD"?"CASH":strtoupper($pesanan['metode_bayar']) ?></td>
                                <td><?= ucfirst($pesanan['pesanan']['metode_kirim']) ?></td>
                                <td class="text-left">Rp. <?= number_format($pesanan['pesanan']['total'], 0, ',', '.') ?></td>
                                <td class="text-left">Rp. <?= number_format($pesanan['pesanan']['ppn'], 0, ',', '.') ?></td>
                                <td class="text-left">Rp. <?= number_format($pesanan['pesanan']['ppn'] + $pesanan['pesanan']['total'], 0, ',', '.') ?></td>
                                <?php if($pesanan['pengiriman']):?>
                                    <td><?= ucfirst($pesanan['pengiriman']['status']) == "Terkirim"?"Diterima":ucfirst($pesanan['pengiriman']['status']) ?></td>
                                <?php else:?>
                                    <td>COD</td>
                                <?php endif?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section><!-- End Frequently Asked Questions Section -->

</main>