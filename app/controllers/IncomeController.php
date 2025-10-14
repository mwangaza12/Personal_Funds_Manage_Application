<?php
require_once __DIR__ . '/../models/Income.php';

class IncomeController {
    private $income;

    public function __construct($pdo) {
        $this->income = new Income($pdo);
    }

    public function capture() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /login");
            exit();
        }

        $message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $source = trim($_POST['source']);
            $amount = (float) $_POST['amount'];
            $description = trim($_POST['description']);

            if ($this->income->add($source, $amount, $description)) {
                $message = "✅ Income record added successfully!";
            } else {
                $message = "❌ Failed to add income record. Please try again.";
            }
        }

        include __DIR__ . '/../views/income_form.php';
    }
}
