<?php foreach ($barangs as $index => $barang): ?>
        <div class="col-xl-4 col-md-6 portfolio-item pupuk">
            <div class="portfolio-wrap text-center">
                <a href="/assets/img/barang/<?= $barang['gambar'] ?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="/assets/img/barang/<?= $barang['gambar'] ?>" class="img-fluid" alt="gambar"></a>
                <div class="portfolio-info">
                    <h4><a href="/public/detail-barang/<?= $barang['gambar'] ?>" title="More Details"><?= $barang['nama'] ?></a></h4>
                    <div class="d-flex justify-content-between mt-4">
                        <p class="post-author-list"><?= $barang['kategori_nama'] ?></p>
                        <small><u>Kilogram (KG)</u></small>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-info">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach; ?>