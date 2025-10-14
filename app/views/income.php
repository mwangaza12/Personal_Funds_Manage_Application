<?php ob_start(); ?>

<h1>Welcome back, <?= htmlspecialchars($_SESSION['username']) ?></h1>

<div class="date-picker-container">
    <form method="post" class="report-form">
        <h2>Income Report</h2>
        <label>Start Date:</label>
        <input type="date" name="start_date" required value="<?= htmlspecialchars($start_date) ?>">
        <label>End Date:</label>
        <input type="date" name="end_date" required value="<?= htmlspecialchars($end_date) ?>">
        <button type="submit">Generate</button>
    </form>
</div>

<?php if ($records && $total): ?>
<div class="report-results">
    <h2>Report Summary</h2>
    <p><strong>From:</strong> <?= htmlspecialchars($start_date) ?> 
       <strong>To:</strong> <?= htmlspecialchars($end_date) ?></p>
    <p><strong>Total Income:</strong> <?= number_format($total['total_amount'] ?? 0, 2) ?></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Date</th>
                <th>Source</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['date']) ?></td>
                <td><?= htmlspecialchars($row['source']) ?></td>
                <td><?= htmlspecialchars($row['details']) ?></td>
                <td><?= number_format($row['amount'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p>No income records found between these dates.</p>
<?php endif; ?>

<?php $content = ob_get_clean(); include __DIR__ . '/layout.php'; ?>
