<?php ob_start(); ?>

<h1>Welcome back, <?= htmlspecialchars($_SESSION['username']) ?></h1>

<div class="dashboard">
    <div class="card summary">
        <h2>Dashboard Summary</h2>
        <div class="stats">
        <div class="stat-box income">
            <h3>Total Income</h3>
            <p>$<?= number_format($totalIncome, 2) ?></p>
        </div>
        <div class="stat-box expense">
            <h3>Total Expenditure</h3>
            <p>$<?= number_format($totalExpenditure, 2) ?></p>
        </div>
        <div class="stat-box balance">
            <h3>Balance</h3>
            <p>$<?= number_format($balance, 2) ?></p>
        </div>
        </div>
    </div>

    <div class="card about">
        <h2>About</h2>
        <p>
        The Personal Finance Management Application helps you take control of your money.
        Track your income, expenses, and savings goals — all in one place.
        </p>
    </div>

    <div class="card features">
        <h2>Key Features</h2>
        <ul>
            <li><strong>Expense Tracking:</strong> Record and categorize spending for better insights.</li>
            <li><strong>Budgeting:</strong> Set realistic budgets and monitor your goals.</li>
            <li><strong>Financial Goals:</strong> Save smarter for things that matter.</li>
            <li><strong>Reports & Insights:</strong> Visualize trends and track progress.</li>
        </ul>
    </div>
</div>

<?php $content = ob_get_clean(); include __DIR__ . '/layout.php'; ?>
