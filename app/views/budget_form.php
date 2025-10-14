<?php ob_start(); ?>
<h1>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

<form method="post">
  <div class="container">
    <h2>Budget Capture</h2>

    <div>
      <label>Description</label>
      <input type="text" name="description" autocomplete="off" required>
    </div>

    <div>
      <label>Amount</label>
      <input type="number" name="amount" autocomplete="off" required>
    </div>

    <button type="submit">Submit</button>
  </div>
</form>

<?php if (isset($message)): ?>
  <p class="status"><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<h3>Previous Entries</h3>
<ul>
  <?php foreach ($entries as $entry): ?>
    <li><?php echo htmlspecialchars($entry['description']); ?> — $<?php echo htmlspecialchars($entry['amount']); ?></li>
  <?php endforeach; ?>
</ul>

<?php $content = ob_get_clean(); include __DIR__ . '/layout.php'; ?>
