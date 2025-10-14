<?php
require_once __DIR__ . '/../models/Income.php';
require_once __DIR__ . '/../models/Expenditure.php';

class HomeController {
    private $income;
    private $expenditure;

    public function __construct($pdo) {
        $this->income = new Income($pdo);
        $this->expenditure = new Expenditure($pdo);
    }

    public function index() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /login");
            exit();
        }

        $totalIncome = $this->income->getTotalBetween('2000-01-01', date('Y-m-d'))['total_amount'] ?? 0;
        $totalExpenditure = $this->expenditure->getTotalBetween('2000-01-01', date('Y-m-d'))['total_amount'] ?? 0;
        $balance = $totalIncome - $totalExpenditure;

        include __DIR__ . '/../views/home.php';
    }
}
