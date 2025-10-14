<?php
require_once __DIR__ . '/../models/Income.php';

class IncomeReportController {
    private $income;

    public function __construct($pdo) {
        $this->income = new Income($pdo);
    }

    public function show() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /login");
            exit();
        }

        $records = [];
        $total = null;
        $start_date = $end_date = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $start_date = $_POST['start_date'] ?? '';
            $end_date = $_POST['end_date'] ?? '';

            if ($start_date && $end_date) {
                $records = $this->income->getRecordsBetween($start_date, $end_date);
                $total = $this->income->getTotalBetween($start_date, $end_date);
            }
        }

        include __DIR__ . '/../views/income_report.php';
    }
}
