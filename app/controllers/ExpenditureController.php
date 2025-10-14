<?php
require_once __DIR__ . '/../models/Expenditure.php';

class ExpenditureController {
    private $expenditure;

    public function __construct($pdo) {
        $this->expenditure = new Expenditure($pdo);
    }

    public function capture() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /login");
            exit();
        }

        $message = '';
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $particulars = trim($_POST['particulars']);
            $amount = (float) $_POST['amount'];
            $category = trim($_POST['category']);

            if (empty($particulars) || empty($amount) || empty($category)) {
                $error = "All fields are required.";
            } else {
                if ($this->expenditure->add($particulars, $amount, $category)) {
                    $message = "✅ Expenditure record added successfully!";
                } else {
                    $error = "❌ Failed to add record. Please try again.";
                }
            }
        }

        include __DIR__ . '/../views/expenditure_form.php';
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
                $records = $this->expenditure->getRecordsBetween($start_date, $end_date);
                $total = $this->expenditure->getTotalBetween($start_date, $end_date);
            }
        }

        include __DIR__ . '/../views/expenditure_report.php';
    }
}
