<?php ob_start(); ?>

<h1>Welcome back, <?= htmlspecialchars($_SESSION['username']) ?></h1>

<form method="post">
    <div class="container">
        <h1>EXPENDITURE CAPTURE</h1>

        <div>
            <label>Particulars</label>
            <input type="text" name="particulars" required autocomplete="off">
        </div>

        <div>
            <label>Amount Spent</label>
            <input type="number" name="amount" required autocomplete="off">
        </div>

        <div>
            <label>Category</label>
            <input type="text" name="category" required autocomplete="off">
        </div>

        <button type="submit">Submit</button>
    </div>
</form>

<?php if (!empty($message)): ?>
    <p style="color:green; margin-top:10px;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <p style="color:red; margin-top:10px;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<?php $content = ob_get_clean(); include __DIR__ . '/layout.php'; ?>
