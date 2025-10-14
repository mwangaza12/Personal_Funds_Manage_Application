<?php
require_once __DIR__ . '/../models/Budget.php';
require_once __DIR__ . '/../helpers/auth.php';

class BudgetController {
    private $budget;

    public function __construct($pdo) {
        $this->budget = new Budget($pdo);
    }

    public function index() {
        check_session();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = trim($_POST['description']);
            $amount = (float) $_POST['amount'];

            if ($this->budget->create($description, $amount)) {
                $message = "Inserted successfully!";
            } else {
                $message = "Failed to insert record.";
            }
        }

        $entries = $this->budget->all();
        include __DIR__ . '/../views/budget_form.php';
    }
}
