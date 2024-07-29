<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Produk</h2>
                <p>Temukan berbagai produk berkualitas untuk mendukung pertanian Anda. Dari pupuk organik hingga mesin pertanian modern, kami memiliki semua yang Anda butuhkan.</p>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container d-flex justify-content-between">
                <ol>
                <li><a href="/">Home</a></li>
                <li>Produk</li>
                </ol>
                <div>
                    <a href="/keranjang">
                    <i class="bi bi-cart4"></i> Keranjang
                    </a>
                </div>
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
                    <?php include __DIR__ . '/../../../components/pelanggan/card-produk.php'; ?>
                    <?php include __DIR__ . '/../../../components/pelanggan/card-produk.php'; ?>
                    <?php include __DIR__ . '/../../../components/pelanggan/card-produk.php'; ?>
                    <?php include __DIR__ . '/../../../components/pelanggan/card-produk.php'; ?>
                    <?php include __DIR__ . '/../../../components/pelanggan/card-produk.php'; ?>
                    <?php include __DIR__ . '/../../../components/pelanggan/card-produk.php'; ?>


                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- End Portfolio Section -->


</main>