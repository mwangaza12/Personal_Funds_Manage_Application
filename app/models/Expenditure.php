<?php
class Expenditure {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function add($particulars, $amount, $category) {
        $date = date('Y-m-d');

        $stmt = $this->db->prepare("
            INSERT INTO expenditure (date, particulars, amount_spent, category)
            VALUES (:date, :particulars, :amount, :category)
        ");

        return $stmt->execute([
            ':date' => $date,
            ':particulars' => $particulars,
            ':amount' => $amount,
            ':category' => $category
        ]);
    }

    public function getTotalBetween($start_date, $end_date) {
        $stmt = $this->db->prepare("
            SELECT SUM(amount_spent) as total_amount 
            FROM expenditure 
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
            SELECT date, particulars, amount_spent, category 
            FROM expenditure 
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
