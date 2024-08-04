<?php
require_once 'BaseModel.php';

class User extends BaseModel {
    public function __construct($pdo) {
        parent::__construct($pdo, 'users'); // 'pelanggan' adalah nama tabel
    }

    public function getByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($email, $password, $role='pelanggan') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        var_dump($email, $password, $hashedPassword, $role);
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $hashedPassword, $role]);
    }

}