<?php
require_once '../models/Kategori.php';
require_once '../models/Barang.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php'; 
require_once '../helpers/ImageHandler.php'; // Update nama file jika diperlukan

class BarangAdminCtrl {

    private $kategori;
    private $barang;
    private $imageHelper;

    public function __construct($pdo = null) {
        $this->barang = new Barang($pdo);
        $this->kategori = new Kategori($pdo);
        $this->imageHelper = new ImageHandler();
    }

    // Daftar barang
    public function list() {
        $kategori = $this->kategori->getAll();
        $barang = $this->barang->getAllWithCategory();
        renderView('admin/barang/list', compact('barang', 'kategori'));
    }

    // Daftar barang
    public function detail($id) {
        $barang = $this->barang->getByIdWithCategory($id);
        renderView('admin/barang/detail', compact('barang'));
    }

    // Tambah barang
    public function create() {
        $kategori = $this->kategori->getAll();
        renderView('admin/barang/create', compact('kategori'));
    }

    public function store(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id_kategori = filter_input(INPUT_POST, 'id_kategori', FILTER_DEFAULT);
                $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
                $deskripsi = filter_input(INPUT_POST, 'deskripsi', FILTER_DEFAULT);
                $berat = filter_input(INPUT_POST, 'berat', FILTER_DEFAULT);
                $satuan = filter_input(INPUT_POST, 'satuan', FILTER_DEFAULT);
                $harga = filter_input(INPUT_POST, 'harga', FILTER_DEFAULT);
                $stok = filter_input(INPUT_POST, 'stok', FILTER_DEFAULT);

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
                    $gambarFileName = null; // Tidak ada gambar di-upload
                }

                // Simpan data barang ke database
                $this->barang->create($id_kategori, $nama, $satuan, $harga, $stok, $deskripsi, $gambarFileName, $berat);
                setFlash('success', 'Barang berhasil ditambahkan!');
                redirect('/admin/barang');
            } catch (\Exception $e) {
                setFlash('error', 'Server error, gagal menambahkan barang!'. $e->getMessage());
                redirect('/admin/barang');
            }
        }
    }

    // Tambah barang
    public function edit($id) {
        $kategori = $this->kategori->getAll();
        $barang = $this->barang->getById($id);
        renderView('admin/barang/edit', compact('barang', 'kategori'));
    }

    // Update barang
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id_kategori = filter_input(INPUT_POST, 'id_kategori', FILTER_DEFAULT);
                $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
                $deskripsi = filter_input(INPUT_POST, 'deskripsi', FILTER_DEFAULT);
                $berat = filter_input(INPUT_POST, 'berat', FILTER_DEFAULT);
                $satuan = filter_input(INPUT_POST, 'satuan', FILTER_DEFAULT);
                $harga = filter_input(INPUT_POST, 'harga', FILTER_DEFAULT);
                $stok = filter_input(INPUT_POST, 'stok', FILTER_DEFAULT);

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
                    $gambarFileName = $this->barang->getById($id)['gambar'] ?? null;
                }

                // Update data barang di database
                $this->barang->update($id, $id_kategori, $nama, $satuan, $harga, $stok, $deskripsi, $gambarFileName, $berat);
                setFlash('success', 'Barang berhasil diubah!');
                redirect('/admin/barang');
            } catch (\Exception $e) {
                setFlash('error', 'Server error, gagal mengubah barang!'.$e->getMessage());
                redirect('/admin/barang');
            }
        }
    }

    // Hapus barang
    public function destroy($id) {
        try {
            $this->barang->delete($id);
            setFlash('success', 'Barang berhasil dihapus!');
            redirect('/admin/barang');
        } catch (\Exception $e) {
            setFlash('error', 'Server error, gagal menghapus barang!');
            redirect('/admin/barang');
        }
    }
}
?>
