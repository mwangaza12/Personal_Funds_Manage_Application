<?php
class Budget {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($description, $amount) {
        $stmt = $this->db->prepare("INSERT INTO ex_category (description, amount) VALUES (:description, :amount)");
        return $stmt->execute([
            ':description' => $description,
            ':amount' => $amount
        ]);
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM ex_category ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
