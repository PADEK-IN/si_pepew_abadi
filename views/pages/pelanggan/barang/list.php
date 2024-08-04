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
                        <li data-filter=".pupuk">Pupuk</li>
                        <li data-filter=".racun">Racun</li>
                        <li data-filter=".Mesin">Mesin</li>
                    </ul><!-- End Portfolio Filters -->
                </div>

                <div class="row gy-4 portfolio-container">
                    <?php foreach ($barangs as $index => $barang): ?>
                        <div class="col-xl-4 col-md-6 portfolio-item pupuk">
                            <div class="portfolio-wrap text-center">
                                <a href="/assets/img/barang/<?= $barang['gambar'] ?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="/assets/img/barang/<?= $barang['gambar'] ?>" class="img-fluid" alt="gambar"></a>
                                <div class="portfolio-info">
                                    <h4><a href="/barang/detail/<?= $barang['id'] ?>" title="More Details"><?= $barang['nama'] ?></a></h4>
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
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->


</main>