<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Detail Barang</h2>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/barang">Barang</a></li>
                    <li>Detail</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <!-- content -->
                <div class="col-lg-8">
                    <!-- Artikel -->
                    <article class="blog-details">
                        <div class="post-img text-center mt-1">
                            <img src="/assets/img/barang/<?= $barang['gambar'] ?>" alt="gambar_barang" class="img-fluid">
                        </div>
                        <h2 class="title"><?= $barang['nama'] ?></h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-menu-button"></i> <a href="#"><?= $barang['kategori_nama'] ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-basket"></i> <a href="#"><?= $barang['stok'] ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-bucket"></i> <a href="#"><?= $barang['stok'] ?> <?= $barang['satuan'] ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-tags"></i> <a href="#">Rp. <?= number_format($barang['harga'], 2, ',', '.'); ?></a></li>
                            </ul>
                        </div>
                        <div class="content">
                            <p>INI DESKRIPSI</p>
                            <P><?= $barang['deskripsi'] ?></P>
                        </div>
                        <div class="meta-bottom">
                            <ul class="cats">
                                <a href="/keranjang" class="btn btn-primary text-white">
                                    <i class="bi bi-cart-plus"></i>
                                    Masuk Keranjang
                                </a>
                            </ul>
                            
                            <ul class="tags">
                                <a href="/checkout" class="btn btn-warning">
                                    <i class="bi bi-bag"></i>
                                    Beli Sekarang
                                </a>
                            </ul>
                        </div>
                    </article>
                </div>

                <!-- sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- categori -->
                        <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="mt-3">
                                <?php foreach($kategori as $item):?>
                                    <li><a href="<?= $item['id'] ?>"><?= $item['nama'] ?> <span>(25)</span></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>

                        <!-- recent post list -->
                        <!-- <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Produk Yang Sejenis</h3>
                            <div class="mt-3">
                                <div class="post-item mt-3">
                                    <img src="../assets/img/product/pupuk.jpeg" style="width: 40px;" alt="">
                                    <div>
                                        <h4><a href="">Zinc sulphate Zinc sulphate heptahydrate</a></h4>
                                        <time>Rp. 100,000,00</time>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

