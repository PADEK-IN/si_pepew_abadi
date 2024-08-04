<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>My Profile</h2>
                    <p>Lengkapi profile mu untuk kelengkapan data yang baik.</p>
                </div>
            </div>
        </div>
        </div>
        <nav class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <ol>
                    <li><a href="/home">Home</a></li>
                    <li>Profile</li>
                </ol>
            </div>
            <div class="">
                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profile</button>
            </div>
        </nav>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/profile/update/<?= $profile['id'] ?>" method="post" id="edit-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="col-form-label">Nama:</label>
                            <input type="text" name="nama" class="form-control" value="<?= $profile['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="laki-laki" <?= $profile['jenis_kelamin']=='laki-laki'?'selected':'' ?>>Laki-Laki</option>
                                <option value="perempuan" <?= $profile['jenis_kelamin']=='perempuan'?'selected':'' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Alamat:</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $profile['alamat'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Pekerjaan:</label>
                            <input type="text" name="pekerjaan" class="form-control" value="<?= $profile['pekerjaan'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Kota:</label>
                            <input type="text" name="kota" class="form-control" value="<?= $profile['kota'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Kode Pos:</label>
                            <input type="number" name="kode_pos" class="form-control" value="<?= $profile['kode_pos'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Perusahaan:</label>
                            <input type="text" name="perusahaan" class="form-control" value="<?= $profile['perusahaan'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">NPWP:</label>
                            <input type="text" name="npwp" class="form-control" value="<?= $profile['npwp'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Nomor Telepon:</label>
                            <input type="text" name="no_telp" class="form-control" value="<?= $profile['no_telp'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Foto Profile:</label>
                            <div>
                                <img src="/assets/img/profile/<?= $profile['foto'] ?>" alt="foto profile" width="50px">
                                <input type="file" name="foto" class="form-control">
                            </div>
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
    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4 align-items-center">

                <div class="col-lg-4">
                    <img src="/assets/img/profile/<?= $profile['foto'] ?>" alt="" class="img-fluid rounded-pill">
                </div>

                <div class="col-lg-8">
                    <div class=" d-flex align-items-center m-lg-4">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= $profile['nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $profile['jenis_kelamin'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= $profile['alamat'] ?></td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td><?= $profile['kota'] ?></td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td><?= $profile['kode_pos'] ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= $profile['pekerjaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Perusahaan</th>
                                <td><?= $profile['perusahaan'] ?></td>
                            </tr>
                            <tr>
                                <th>NPWP</th>
                                <td><?= $profile['npwp'] ?></td>
                            </tr>
                            <tr>
                                <th>No Telephon</th>
                                <td><?= $profile['no_telp'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Stats Counter Section -->

</main>