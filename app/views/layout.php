<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Dashboard') ?></title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

    <?php include __DIR__ . '/partials/sidebar.php'; ?>

    <main style="margin-left: 250px; padding: 20px;">
        <?= $content ?? '' ?>
    </main>

</body>
</html>
