<?php
require_once 'BaseModel.php';

class User extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'pelanggan'); // 'pelanggan' adalah nama tabel
    }

    public function create($data) {
        $query = 'INSERT INTO ' . $this->table . ' (username, email, password, role, created_at, updated_at) VALUES (:username, :email, :password, :role, :created_at, :updated_at)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', password_hash($data['password'], PASSWORD_BCRYPT));
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':created_at', $data['created_at']);
        $stmt->bindParam(':updated_at', $data['updated_at']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = 'UPDATE ' . $this->table . ' SET username = :username, email = :email, password = :password, role = :role, updated_at = :updated_at WHERE id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', password_hash($data['password'], PASSWORD_BCRYPT));
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':updated_at', $data['updated_at']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}