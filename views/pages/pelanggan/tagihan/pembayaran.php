<main>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <h2>Pembayaran Tagihan</h2>
            </div>
            </div>
        </div>
        </div>
        <nav>
            <div class="container">
                <ol>
                    <li><a href="/barang">Barang</a></li>
                    <li><a href="/detail">Detail</a></li>
                    <li><a href="/tagihan">Tagihan</a></li>
                    <li>Pembayaran</li>
                </ol>
            </div>
        </nav>
    </div>

    <div class="d-flex justify-content-center my-4">
        <div class=" col-lg-6 card text-center">
            <div class="card-header">
                Pembayaran
            </div>
            <div class="card-body">
                <h5 class="card-title fs-3 text-warning">123456789012345</h5>
                <p class="card-text fd-5 fst-italic">a/n CV. Anugerah Abadi</p>
                <p class="card-text fs-4 text-primary fw-bold">Rp. <?= number_format($net, 2, ',' , '.') ?></p>
                <p class="card-text">Silahkan lakukan pembayaran transfer ke nomor rekening di atas. Untuk menyelesaikan pemesanan. Dalam waktu 1x24 jam.</p>
                <button href="" class="btn btn-sm btn-primary"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Upload Bukti Pembayaran
                </button>
            </div>
            <div class="card-footer text-muted" id="timer-count-down">
                23:59:59
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/tagihan/pembayaran" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload BUkti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Jumlah Pembayaran:</label>
                            <input type="number" name="id_pesanan" class="form-control d-none" value="<?= $pesananId ?>">
                            <input type="number" name="jumlah_bayar" class="form-control" value="<?= $net ?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Bukti Pembayaran:</label>
                            <input type="file" name="bukti" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    // Mengatur waktu target hitung mundur
    var countdownDate = new Date().getTime() + 24 * 60 * 60 * 1000 - 1; // Misalnya, hitung mundur 24 jam dari sekarang

    // Fungsi untuk memperbarui waktu
    function updateCountdown() {
        var now = new Date().getTime();
        var distance = countdownDate - now;

        // Hitung hari, jam, menit, dan detik
        var hours = Math.floor((distance % (24 * 60 * 60 * 1000)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (60 * 60 * 1000)) / (1000 * 60));
        var seconds = Math.floor((distance % (60 * 1000)) / 1000);

        // Format dengan leading zero jika perlu
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        // Update elemen HTML
        document.getElementById('timer-count-down').innerHTML = hours + ':' + minutes + ':' + seconds;

        // Jika waktu habis, tampilkan pesan atau lakukan sesuatu
        if (distance < 0) {
            clearInterval(interval);
            document.getElementById('timer-count-down').innerHTML = "EXPIRED";
        }
    }

    // Perbarui hitung mundur setiap detik
    var interval = setInterval(updateCountdown, 1000);

    // Inisialisasi pertama kali
    updateCountdown();
</script>