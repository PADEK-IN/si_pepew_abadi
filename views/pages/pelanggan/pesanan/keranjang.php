<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Keranjang</h2>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <!-- <li><a href="/">Home</a></li> -->
                    <li><a href="/barang">Barang</a></li>
                    <li>Keranjang</li>
                </ol>
            </div>
        </nav>
    </div>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <?php if($barang): ?>
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="content px-xl-5">
                        <h3>Yuk... <br><strong>ChekOut</strong></h3>
                        <p>Barang Numpuk di keranjangmu? Yuk segera checkout sekarang juga!</p>
                    </div>
                </div>
    
                <div class="col-lg-7">
                    <?php foreach($barang as $item): ?>
                        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-3 px-5 position-relative">
                            <input type="checkbox" id="check-all" onclick="toggleAll()">
                            <label for="check-all" class="ms-2">Pilih Semua</label>
                        </div>
                        <div class="container my-2 d-flex align-items-center gap-2 rounded-lg shadow py-3 px-5 position-relative">
                            <span class="position-absolute top-0 end-0 p-2" style="cursor: pointer;" onclick="deleteItem('<?= $item['id'] ?>','<?= $item['nama'] ?>')">
                                <i class="bi bi-trash text-danger fs-4"></i>
                            </span>
                            <input type="checkbox" class="checkbox-cart" id="check-<?= $item['id'] ?>" onclick="updateTotal()">
                            <div class="col-lg-3 text-center">
                                <img src="/assets/img/barang/<?= $item['gambar'] ?>" height="150px" width="150px" style="object-fit: cover;">
                            </div>
                            <div class="col-lg-8 d-flex flex-column py-2 justify-content-between" style="height: 150px;">
                                <div class="fs-4 gap-2" data-bs-toggle="collapse" data-bs-target="#keranjang-1">
                                    <span><?= $item['nama'] ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="fs-5 gap-1"><i class="bi bi-tags"></i>Rp. <?= number_format($item['harga'], 2, ',', '.'); ?></div>
                                    <div class="d-flex gap-1">
                                        <button class="border border-2 text-center" style="width: 25px;" onclick="min('<?= $item['id'] ?>')">-</button>
                                        <input class="border border-2 text-center" style="width: 30px;" id="jumlah-<?= $item['id'] ?>" type="text" value="<?= $item['jumlah'] ?>" oninput="updateTotal()"/>
                                        <button class="border border-2 text-center" style="width: 25px;" onclick="plus('<?= $item['id'] ?>')">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="col-lg-12 d-flex justify-content-end">
                    <h3>Total Belanja: <span id="totalBelanja">Rp. 0</span></h3>
                </div>

                <button type="button" class="btn btn-success" onclick="checkout()">Checkout</button>
            </div>
        </div>
        <?php else: ?>
        <div class="container text-center">
            <h3 class="text-center">Keranjang Kosong</h3>
            <p>Silahkan pilih barang terlebih dahulu</p>
            <a href="/barang" class="btn btn-warning">Lihat Barang</a>
        </div>
        <?php endif ?>
    </section><!-- End Frequently Asked Questions Section -->
</main>

<!-- Include Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<script>
    function toggleAll() {
        var checkboxes = document.getElementsByClassName('checkbox-cart');
        var checkAll = document.getElementById('check-all');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = checkAll.checked;
        }
        updateTotal();
    }

    function checkout() {
        var checkedItems = [];
        var checkboxes = document.getElementsByClassName('checkbox-cart');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedItems.push(checkboxes[i].id.split('-')[1]);
            }
        }
        if (checkedItems.length > 0) {
            console.log(checkedItems)
            // window.location.href = `/checkout?items=${checkedItems.join(',')}`;
        } else {
            swal({
                title: "Keranjang Kosong",
                text: "Pilih barang terlebih dahulu sebelum checkout",
                icon: "warning",
                button: "OK"
            });
        }
    }

    function deleteItem(id, name) {
        swal({
            title: `Yakin ingin menghapus ${name} dari keranjang?`,
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "Confirm"
            },
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = `/keranjang/delete/${id}`;
            }
        });
    }

    function plus(id) {
        var jumlahInput = document.getElementById('jumlah-' + id);
        var jumlah = parseInt(jumlahInput.value) || 0;
        jumlahInput.value = jumlah + 1;
        updateTotal();
    }

    function min(id) {
        var jumlahInput = document.getElementById('jumlah-' + id);
        var jumlah = parseInt(jumlahInput.value) || 0;
        if (jumlah > 1) {
            jumlahInput.value = jumlah - 1;
            updateTotal();
        }
    }

    function updateTotal() {
        var total = 0;
        <?php foreach($barang as $item): ?>
            if (document.getElementById('check-<?= $item['id'] ?>').checked) {
                var jumlah = parseInt(document.getElementById('jumlah-<?= $item['id'] ?>').value) || 0;
                var harga = <?= $item['harga'] ?>;
                total += jumlah * harga;
            }
        <?php endforeach ?>
        
        document.getElementById('totalBelanja').innerText = 'Rp. ' + total.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Initialize total on page load
    document.addEventListener('DOMContentLoaded', updateTotal);
</script>
