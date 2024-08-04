<?php
require_once '../models/Pelanggan.php';
require_once '../models/User.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php';
require_once '../helpers/ImageHandler.php';
class IndexCtrl {
    private $isAuth;
    private $user;
    private $pelanggan;
    private $imageHelper;

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();
        $this->user = new User($pdo);
        $this->pelanggan = new Pelanggan($pdo);
        $this->isAuth->isUser();
        $this->imageHelper = new ImageHandler();
    }

    public function guest() {
        renderView('guest/index');
    }

    public function home() {
        renderView('pelanggan/home/index');
    }

    public function profile() {
        $profile = $this->pelanggan->getByUserEmail($_SESSION['user']['email']);
        renderView('pelanggan/home/profile', compact('profile'));
    }

    public function profileUpdate($id) {
        $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
        $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
        $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);
        $kota = filter_input(INPUT_POST, 'kota', FILTER_DEFAULT);
        $kode_pos = filter_input(INPUT_POST, 'kode_pos', FILTER_SANITIZE_NUMBER_INT);
        $pekerjaan = filter_input(INPUT_POST, 'pekerjaan', FILTER_DEFAULT);
        $perusahaan = filter_input(INPUT_POST, 'perusahaan', FILTER_DEFAULT);
        $npwp = filter_input(INPUT_POST, 'npwp', FILTER_DEFAULT);
        $email = $_SESSION['user']['email'];
        // Tangani upload gambar
        $gambar = $_FILES['gambar'] ?? null; // Ambil gambar dari input file
        if ($gambar && $gambar['error'] === UPLOAD_ERR_OK) {
            $result = $this->imageHelper->uploadImage($gambar);
            if (!$result['success']) {
                setFlash('error', $result['message']);
                redirect('/admin/barang');
                return;
            }
            $gambarFileName = $result['filename'];
        } else {
            // Ambil gambar lama jika tidak ada gambar baru
            $gambarFileName = $this->pelanggan->getById($id)['foto'] ?? null;
        }

        try {
            $this->pelanggan->update($id, $email, $nama, $jenis_kelamin, $alamat, $no_telp, $kota, $kode_pos, $pekerjaan, $perusahaan, $npwp, $gambarFileName);
            setFlash('success', 'Profile berhasil diupdate');
            redirect('/profile');
        } catch (\Exception $e) {
            setFlash('error', 'Server Error, gagal mengupdate profile'. $e->getMessage());
            redirect('/profile');
        }
    }

}
