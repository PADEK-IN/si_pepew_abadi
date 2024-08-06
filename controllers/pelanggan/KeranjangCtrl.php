<?php
require_once '../helpers/isAuth.php';
require_once '../models/Keranjang.php';
require_once '../helpers/flash.php';
require_once '../helpers/redirect.php';

class KeranjangCtrl {
    private $isAuth;
    private $keranjang;

    public function __construct($pdo=null) {
        $this->keranjang = new Keranjang($pdo);
        $this->isAuth = new MiddlewareAuth();
        $this->isAuth->isUser();
    }

    public function list() {
        $id_user = $_SESSION['user']['id'];
        $barang = $this->keranjang->getAllWithBarang($id_user);
        renderView('pelanggan/pesanan/keranjang', compact('barang'));
    }

    public function store($id) {
        $keranjang = $this->keranjang->getByIdBarangAndIdUser($id, $_SESSION['user']['id']);
        
        if($keranjang) {
            $updateJumlah = $keranjang['jumlah']+1;
            $this->keranjang->update($keranjang['id'], $updateJumlah);
            setFlash('success', 'Barang sudah ada di keranjang');
            redirect('/barang/detail/'.$id);
        }else{
            $this->keranjang->create($_SESSION['user']['id'], $id, 1);
            setFlash('success', 'Barang berhasil dimasukkan ke keranjang');
            redirect('/barang/detail/'.$id);
        }
    }

    public function update($id) {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $this->keranjang->update($id, $data['jumlah']);
            $response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Keranjang berhasil diperbarui'
            ];
            echo json_encode($response);
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'code' => 500,
                'message' => 'Terjadi kesalahan saat memperbarui keranjang'
            ];
            echo json_encode($response);
        }
    }

    public function destroy($id) {
        $this->keranjang->delete($id);
        setFlash('success', 'Barang berhasil dihapus dari keranjang');
        redirect('/keranjang');
    }

}
