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
                    <!-- <li><a href="/home">Home</a></li> -->
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
                        <div class="post-img text-center">
                            <img src="/assets/img/barang/<?= $barang['gambar'] ?>" alt="gambar_barang" class="img-fluid">
                        </div>
                        <h2 class="title"><?= $barang['nama'] ?></h2>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-menu-button"></i> <a href="#"><?= $barang['kategori_nama'] ?></a></li>
                                <li class="d-flex align-items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" viewBox="0 0 16 16"><path fill="currentColor" d="m15.81 9l-2.47-4.93l.83-.15a.509.509 0 1 0-.183-.999l-.777.14a5.96 5.96 0 0 0-4.236-1.178a.958.958 0 0 0-.967-.882h-.008a1 1 0 0 0-1 1v.2a6.332 6.332 0 0 0-4.066 2.697l-.754.153a.503.503 0 1 0 .092 1h.088l.35-.05l-2.52 5h-.19c0 1.1 1.34 2 3 2s3-.9 3-2h-.19l-2.56-5.12h.1a.512.512 0 0 0 .379-.297c.021-.093.701-1.583 3.271-2.363v10.78h-1v1h-2v1h8v-1h-2v-1h-1V2.881a4.617 4.617 0 0 1 3.686 1.065l-.006-.005l-2.49 5.06h-.19c0 1.1 1.34 2 3 2s3-.9 3-2zM5 11H1l2-3.94zm6-2l2-3.94L15 9z"/></svg>
                                    <span><?= $barang['berat'] ?> gram</span>
                                </a></li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-bucket"></i> 
                                    <?php 
                                        if ($barang['stok'] == 0) {
                                            echo '<span class="badge bg-danger">Kosong</span>';
                                        } else {
                                            echo sprintf('%s %s', $barang['stok'], $barang['satuan']);
                                        }
                                    ?>
                                    <!-- <a href="#"><?= $barang['stok'] ?> <?= $barang['satuan'] ?></a> -->
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-tags"></i> <a href="#">Rp. <?= number_format($barang['harga'], 2, ',', '.'); ?></a></li>
                            </ul>
                        </div>
                        <div class="content">
                            <p>DESKRIPSI</p>
                            <P><?= $barang['deskripsi'] ?></P>
                        </div>
                        <div class="meta-bottom">
                            <ul class="cats">
                                <a href="/login" class="btn btn-primary text-white">
                                    <i class="bi bi-cart-plus"></i>
                                    Masuk Keranjang
                                </a>
                            </ul>
                            
                            <ul class="tags">
                                <!-- <a href="/login" class="btn btn-warning">
                                    <i class="bi bi-bag"></i>
                                    Beli Sekarang
                                </a> -->
                                <?php 
                                    if ($barang['stok'] == 0) {
                                        echo '
                                        <span style="cursor: pointer;" class="btn btn-danger">
                                                <i class="bi bi-bag"></i>
                                                Barang Kosong
                                            </span>';
                                    } else {
                                        echo '<a href="/login" class="btn btn-warning">
                                                <i class="bi bi-bag"></i>
                                                Beli Sekarang
                                            </a>';
                                    }
                                ?>
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
                                    <li><a href=""><?= $item['nama'] ?></a></li>
                                    <!-- <li><a href="<?= $item['id'] ?>"><?= $item['nama'] ?> <span>(25)</span></a></li> -->
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

