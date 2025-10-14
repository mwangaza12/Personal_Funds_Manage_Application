<?php
class User {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($username, $name, $phone, $email, $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("
            INSERT INTO users (username, name, phone, email, password)
            VALUES (:username, :name, :phone, :email, :password)
        ");
        return $stmt->execute([
            ':username' => $username,
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email,
            ':password' => $hashed
        ]);
    }
}
