<?php
require_once '../helpers/isAuth.php';
require_once '../models/User.php';
require_once '../models/Admin.php';
require_once '../models/Pelanggan.php';
require_once '../helpers/ImageHandler.php';
require_once '../models/Tagihan.php';

class IndexAdminCtrl {
    private $isAuth;
    private $user;
    private $admin;
    private $pelanggan;
    private $imageHelper;
    private $tagihan; 

    public function __construct($pdo = null) {
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isAdmin();
        $this->imageHelper = new ImageHandler();
        $this->user = new User($pdo);
        $this->admin = new Admin($pdo);
        $this->pelanggan = new Pelanggan($pdo);
        $this->tagihan = new Tagihan($pdo);
    }

    public function dashboard() {
        $totalPelanggan = $this->pelanggan->count();
        $totalAdmin = $this->admin->count();
        $totalPembayaranLunas = $this->tagihan->qtyCountByStatus('lunas');
        $totalTransaksi = $this->tagihan->count();

        $penjualanPerBulan = $this->tagihan->getTotalPendapatanPerBulan();
        // console_log($penjualanPerBulan);

        renderView('admin/dashboard/index', compact('totalPelanggan', 'totalAdmin', 'totalPembayaranLunas', 'totalTransaksi', 'penjualanPerBulan'));
    }

// adminData
    public function admin() {
        $adminUser = $this->admin->getAll();
        
        renderView('admin/user/list-admin', compact('adminUser'));
    }

    public function detailAdmin($id) {
        $admin = $this->admin->getById($id);
        renderView('admin/user/detail-admin', compact('admin'));
    }

    public function createAdmin() {
        renderView('admin/user/create-admin');
    }

    public function storeAdmin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
            $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
            $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
            $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
            $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                setFlash('error', 'Email tidak valid!');
                redirect('/admin/create/admin');
            }

            if (empty($email) || empty($password)) {
                setFlash('error', 'Email dan password harus diisi!');
                redirect('/admin/create/admin');
            }

            if(empty($nama) || empty($jenis_kelamin) || empty($alamat) || empty($no_telp)) {
                setFlash('error', 'Data harus diisi dengan lengkap!');
                redirect('/admin/create/admin');
            }

            // Validasi dan pendaftaran admin
            if ($this->user->getByEmail($email) || $this->admin->getByUserEmail($email)) {
                setFlash('error', 'Email sudah terdaftar!');
                redirect('/admin/create/admin');
            }

            if (!validatePhoneNumber($no_telp)) {
                setFlash('error', 'Nomor telepon tidak valid!. Contoh: +6281234567890');
                redirect('/admin/create/admin');
            }

            try {
                $this->user->create($email, $password, 'admin');
                $this->admin->create($email, $nama, $jenis_kelamin, $alamat, $no_telp);
                setFlash('success', 'Registrasi berhasil! Silakan login.');
                redirect('/admin/admin-list');
            } catch (\Exception $th) {
                setFlash('error', 'Registrasi gagal. Silakan coba lagi.'.$th->getMessage());
                redirect('/admin/create/admin');
            }
        }
    }

    public function editAdmin($id) {
        $adminUser = $this->admin->getById($id);
        renderView('admin/user/edit-admin', compact('adminUser'));
    }

    public function updateAdmin($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
                $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
                $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);

                // Tangani upload foto
                $foto = $_FILES['foto'] ?? null; // Ambil foto dari input file
                if ($foto && $foto['error'] === UPLOAD_ERR_OK) {
                    $result = $this->imageHelper->uploadImageProfile($foto);
                    if (!$result['success']) {
                        setFlash('error', $result['message']);
                        redirect('/admin/admin-list');
                        return;
                    }
                    $fotoFileName = $result['filename'];
                } else {
                    // Ambil foto lama jika tidak ada foto baru
                    $fotoFileName = $this->admin->getById($id)['foto'] ?? null;
                }
                $this->admin->update($id, $email, $nama, $jenis_kelamin, $alamat, $no_telp, $fotoFileName);
                setFlash('success', 'Data Admin berhasil diubah!');
                redirect('/admin/admin-list');
            } catch (\Exception $e) {
                setFlash('error', 'Server error, gagal mengubah Data Admin!'.$e->getMessage());
                redirect('/admin/admin-list');
            }
        }
    }

    public function destroyAdmin($id) {
        try {
            $this->admin->delete($id);
            setFlash('success', 'Admin berhasil dihapus!');
            redirect('/admin/admin-list');
        } catch (\Exception $e) {
            setFlash('error', 'Server error, gagal menghapus Admin!');
            redirect('/admin/admin-list');
        }
    }
    
// pelangganData
    public function pelanggan() {
        $pelangganUser = $this->pelanggan->getAll();
        renderView('admin/user/list-pelanggan', compact('pelangganUser'));
    }

    public function detailPelanggan($id) {
        $pelanggan = $this->pelanggan->getById($id);
        renderView('admin/user/detail-pelanggan', compact('pelanggan'));
    }

    public function createPelanggan() {
        renderView('admin/user/create-pelanggan');
    }

    public function storePelanggan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
            $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
            $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
            $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
            $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                setFlash('error', 'Email tidak valid!');
                redirect('/admin/create/pelanggan');
            }

            if (empty($email) || empty($password)) {
                setFlash('error', 'Email dan password harus diisi!');
                redirect('/admin/create/pelanggan');
            }

            if(empty($nama) || empty($jenis_kelamin) || empty($alamat) || empty($no_telp)) {
                setFlash('error', 'Data harus diisi dengan lengkap!');
                redirect('/admin/create/pelanggan');
            }

            // Validasi dan pendaftaran admin
            if ($this->user->getByEmail($email) || $this->pelanggan->getByUserEmail($email)) {
                setFlash('error', 'Email sudah terdaftar!');
                redirect('/admin/create/pelanggan');
            }

            if (!validatePhoneNumber($no_telp)) {
                setFlash('error', 'Nomor telepon tidak valid!. Contoh: +6281234567890');
                redirect('/admin/create/pelanggan');
            }

            try {
                $this->user->create($email, $password);
                $this->pelanggan->create($email, $nama, $jenis_kelamin, $alamat, $no_telp);
                setFlash('success', 'Registrasi berhasil! Silakan login.');
                redirect('/admin/pelanggan-list');
            } catch (\Exception $th) {
                setFlash('error', 'Registrasi gagal. Silakan coba lagi.'.$th->getMessage());
                redirect('/admin/create/pelanggan');
            }
        }
    }

    public function editPelanggan($id) {
        $pelangganUser = $this->pelanggan->getById($id);
        renderView('admin/user/edit-pelanggan', compact('pelangganUser'));
    }

    public function updatePelanggan($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $jenis_kelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_DEFAULT);
                $alamat = filter_input(INPUT_POST, 'alamat', FILTER_DEFAULT);
                $no_telp = filter_input(INPUT_POST, 'no_telp', FILTER_DEFAULT);
                $kota = filter_input(INPUT_POST, 'kota', FILTER_DEFAULT);
                $kode_pos = filter_input(INPUT_POST, 'kode_pos', FILTER_DEFAULT);
                $pekerjaan = filter_input(INPUT_POST, 'pekerjaan', FILTER_DEFAULT);
                $perusahaan = filter_input(INPUT_POST, 'perusahaan', FILTER_DEFAULT);
                $npwp = filter_input(INPUT_POST, 'npwp', FILTER_DEFAULT);

                // Tangani upload foto
                $foto = $_FILES['foto'] ?? null; // Ambil foto dari input file
                if ($foto && $foto['error'] === UPLOAD_ERR_OK) {
                    $result = $this->imageHelper->uploadImageProfile($foto);
                    if (!$result['success']) {
                        setFlash('error', $result['message']);
                        redirect('/admin/pelanggan-list');
                        return;
                    }
                    $fotoFileName = $result['filename'];
                } else {
                    // Ambil foto lama jika tidak ada foto baru
                    $fotoFileName = $this->pelanggan->getById($id)['foto'] ?? null;
                }
                $this->pelanggan->update($id, $email, $nama, $jenis_kelamin, $alamat, $no_telp,  $kota, $kode_pos, $pekerjaan, $perusahaan, $npwp, $fotoFileName);
                setFlash('success', 'Data Pelanggan berhasil diubah!');
                redirect('/admin/pelanggan-list');
            } catch (\Exception $e) {
                setFlash('error', 'Server error, gagal mengubah Data Pelanggan!'.$e->getMessage());
                redirect('/admin/pelanggan-list');
            }
        }
    }

    public function destroyPelanggan($id) {
        try {
            $this->pelanggan->delete($id);
            setFlash('success', 'Pelanggan berhasil dihapus!');
            redirect('/admin/pelanggan-list');
        } catch (\Exception $e) {
            setFlash('error', 'Server error, gagal menghapus Pelanggan!');
            redirect('/admin/pelanggan-list');
        }
    }

}

