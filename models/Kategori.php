<?php
require_once 'BaseModel.php';

class Kategori extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'kategori');
    }

    public function create($nama) {
        $stmt = $this->pdo->prepare("INSERT INTO kategori (nama) VALUES (?)");
        return $stmt->execute([$nama]);
    }

    public function update($id, $nama) {
        $stmt = $this->pdo->prepare("UPDATE kategori SET nama = ? WHERE id = ?");
        return $stmt->execute([$nama, $id]);
    }
}
?>
