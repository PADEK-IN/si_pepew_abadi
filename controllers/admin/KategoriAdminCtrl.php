<?php
require_once '../models/Kategori.php';
require_once '../helpers/flash.php'; 
require_once '../helpers/redirect.php'; 

class KategoriAdminCtrl{

    private $kategori;
    public function __construct($pdo = null) {
        $this->kategori = new Kategori($pdo);
    }
    
    // kategori
    public function list() {
        $kategori = $this->kategori->getAll();
        renderView('admin/kategori/list', compact('kategori'));
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
                $this->kategori->create($nama);
                setFlash('success', 'Kategori berhasil ditambahkan!');
                redirect('/admin/kategori');
            } catch (\Exception $e) {
                setFlash('error', 'Server error, gagal menambahkan kategori!');
                redirect('/admin/kategori');
            }
        }
    }
    public function update($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $nama = filter_input(INPUT_POST, 'nama', FILTER_DEFAULT);
                $this->kategori->update($id, $nama);
                setFlash('success', 'Kategori berhasil diubah!');
                redirect('/admin/kategori');
            } catch (\Exception $e) {
                setFlash('error', 'Server error, gagal mengubah kategori!');
                redirect('/admin/kategori');
            }
        }
    }
    public function destroy($id) {
        try {
            $this->kategori->delete($id);
            setFlash('success', 'Kategori berhasil dihapus!');
            redirect('/admin/kategori');
        } catch (\Exception $e) {
            setFlash('error', 'Server error, gagal menghapus kategori!');
            redirect('/admin/kategori');
        }
    }
}