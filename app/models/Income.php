<?php
class Income {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function add($source, $amount, $details) {
        $date = date('Y-m-d');
        $stmt = $this->db->prepare("
            INSERT INTO income (source, date, amount, details)
            VALUES (:source, :date, :amount, :details)
        ");
        return $stmt->execute([
            ':source' => $source,
            ':date' => $date,
            ':amount' => $amount,
            ':details' => $details
        ]);
    }

    public function getTotalBetween($start_date, $end_date) {
        $stmt = $this->db->prepare("
            SELECT SUM(amount) as total_amount 
            FROM income 
            WHERE date BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            ':start_date' => $start_date,
            ':end_date' => $end_date
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRecordsBetween($start_date, $end_date) {
        $stmt = $this->db->prepare("
            SELECT source, date, amount, details 
            FROM income 
            WHERE date BETWEEN :start_date AND :end_date
            ORDER BY date ASC
        ");
        $stmt->execute([
            ':start_date' => $start_date,
            ':end_date' => $end_date
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
