<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Dashboard') ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <main class="content">
        <?= $content ?? '' ?>
    </main>

</body>
</html>
