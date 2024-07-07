<?php

class BaseModel {
    protected $pdo;
    protected $table;

    public function __construct($pdo, $table) {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
