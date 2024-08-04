<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Barang</h2>
                <p>Temukan berbagai produk berkualitas untuk mendukung pertanian Anda. Dari pupuk organik hingga mesin pertanian modern, kami memiliki semua yang Anda butuhkan.</p>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container d-flex justify-content-between">
                <ol>
                    <li><a href="/home">Home</a></li>
                    <li>Barang</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div>
                    <ul class="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <?php foreach($kategori as $item):?>
                            <li data-filter=".<?= $item['nama'] ?>"><?= $item['nama'] ?></li>
                        <?php endforeach?>
                    </ul><!-- End Portfolio Filters -->
                </div>

                <div class="row gy-4 portfolio-container">
                <?php foreach ($barangs as $index => $barang): ?>
                    <div class="col-xl-4 col-md-6 portfolio-item <?= $barang['kategori_nama'] ?>">
                        <div class="portfolio-wrap text-center" style="position: relative; overflow: hidden;">
                            <div>
                                <a href="/assets/img/barang/<?= $barang['gambar'] ?>" data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="/assets/img/barang/<?= $barang['gambar'] ?>" class="img-fluid" alt="gambar" 
                                        style="width: 100%; height: 300px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="portfolio-info">
                                <h5><a href="/barang/detail/<?= $barang['id'] ?>" title="More Details"><?= $barang['nama'] ?></a></h5>
                                <div class="d-flex justify-content-between mt-4">
                                    <p style="padding: 0;" class="post-author-list">Kategori: <?= $barang['kategori_nama'] ?></p>
                                    <p style="padding: 0;">Stok: <?= $barang['stok'] ?> <?= $barang['satuan'] ?></p>    
                                </div>
                                <div class="d-flex justify-content-start mt-2">
                                    <p style="padding: 0;" class="text-limit"><?= $barang['deskripsi'] ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4">
                                    <span class="fs-5 text-success">Rp. <?= number_format($barang['harga'], 2, ',', '.'); ?></span>
                                    <button class="btn btn-sm btn-info">Pesan 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->


</main>