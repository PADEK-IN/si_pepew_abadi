<main>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Detail Pesanan</h2>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/barang">Barang</a></li>
                    <li><a href="/detail">Detail</a></li>
                    <li>Pesanan</li>
                </ol>
            </div>
        </nav>
    </div>

    <div class="col-lg-12">
        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-3 px-5 position-relative">
            <div class="col-lg-3 text-center">
                <img src="/assets/img/barang/<?= $barang['gambar'] ?>" height="150px" width="150px" style="object-fit: cover;">
            </div>
            <div class="col-lg-8 d-flex flex-column py-2 justify-content-between" style="height: 150px;">
                <div class="fs-4 gap-2">
                    <span><?= $barang['nama'] ?></span>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="fs-5 gap-1"><i class="bi bi-tags"></i>Rp. <?= number_format($barang['harga'], 2, ',', '.'); ?></div>
                    <div class="d-flex gap-1">
                        <span class="text-center" style="width: 30px;" id="jumlah-<?= $barang['id'] ?>">x <?= $jumlah ?></sopan>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-2 px-5 position-relative">
            <div class="col-lg-8 d-flex flex-column py-2 wrap">
                <div class="fs-4">
                    <span>Alamat</span>
                    <span class="fs-5 mx-1"><i class="bi bi-geo-alt"></i></span>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="fs-5 gap-1"><?= $alamat ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-2 px-5 position-relative">
            <div class="col-lg-12 d-flex flex-column py-2 wrap">
                <div class="fs-4">
                    <span>Metode Pengiriman</span>
                    <span class="fs-3 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><path fill="currentColor" d="M4 16h12v2H4zm-2-5h10v2H2z"/><path fill="currentColor" d="m29.919 16.606l-3-7A1 1 0 0 0 26 9h-3V7a1 1 0 0 0-1-1H6v2h15v12.556A4 4 0 0 0 19.142 23h-6.284a4 4 0 1 0 0 2h6.284a3.98 3.98 0 0 0 7.716 0H29a1 1 0 0 0 1-1v-7a1 1 0 0 0-.081-.394M9 26a2 2 0 1 1 2-2a2 2 0 0 1-2 2m14-15h2.34l2.144 5H23Zm0 15a2 2 0 1 1 2-2a2 2 0 0 1-2 2m5-3h-1.142A3.995 3.995 0 0 0 23 20v-2h5Z"/></svg>
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <select name="metode_bayar" class="form-control" style="width: 100%;">
                        <option>Pilih Metode Pengiriman</option>
                        <option value="diantar">Diantar</option>
                        <option value="dijemput">Dijemput</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-2 px-5 position-relative">
            <div class="col-lg-12 d-flex flex-column py-2 wrap">
                <div class="fs-4">
                    <span>Metode Pembayaran</span>
                    <span class="fs-3 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M10.5 10a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zM1 5.5A2.5 2.5 0 0 1 3.5 3h9A2.5 2.5 0 0 1 15 5.5v5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 10.5zM14 6v-.5A1.5 1.5 0 0 0 12.5 4h-9A1.5 1.5 0 0 0 2 5.5V6zM2 7v3.5A1.5 1.5 0 0 0 3.5 12h9a1.5 1.5 0 0 0 1.5-1.5V7z"/></svg>
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <select name="metode_bayar" class="form-control" style="width: 100%;">
                        <option>Pilih Metode Pembayaran</option>
                        <option value="cod">COD</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-2 px-5 position-relative">
            <div class="col-lg-8 d-flex flex-column py-2 wrap">
                <div class="fs-4">
                    <span>Total Pembayaran</span>
                    <span class="fs-3 mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M13.5 12.423q-.846 0-1.423-.577t-.577-1.423T12.077 9t1.423-.577T14.923 9t.577 1.423t-.577 1.423t-1.423.577m-6.192 3.193q-.667 0-1.141-.475q-.475-.475-.475-1.141V6.846q0-.666.475-1.14t1.14-.475h12.385q.667 0 1.141.474t.475 1.141V14q0 .666-.475 1.14q-.474.476-1.14.476zm1-1h10.384q0-.672.475-1.144q.474-.472 1.14-.472V7.846q-.67 0-1.142-.474q-.473-.475-.473-1.141H8.308q0 .671-.475 1.143q-.474.472-1.14.472V13q.67 0 1.143.475q.472.474.472 1.14m9.538 4H4.308q-.667 0-1.141-.474q-.475-.475-.475-1.141V8.692q0-.212.144-.356t.357-.144t.356.144t.143.356V17q0 .23.192.423q.193.193.424.193h13.538q.213 0 .356.143q.144.144.144.357t-.144.356t-.356.144m-10.538-4h-.616V6.23h.616q-.25 0-.433.183t-.183.432V14q0 .25.183.433t.433.183"/></svg>
                    </span>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="fs-4 gap-1 text-primary">Rp. <?= number_format($barang['harga']*$jumlah, 2, ',', '.') ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="container my-2 d-flex align-items-center justify-content-between rounded-lg py-2 position-relative">
            <button class="btn btn-success" style="width: 100%;">Buat Pesanan</button>
        </div>
    </div>
    

</main>