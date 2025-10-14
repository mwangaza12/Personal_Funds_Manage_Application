<?php
    $title = "Dashboard";
    ob_start();
?>

<h2>Welcome, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></h2>
<p>Select a menu option to get started.</p>

<?php
    $content = ob_get_clean();
    include __DIR__ . '/layout.php';
?>
