<?php ob_start(); ?>
<div class="login-container">
    <h2>Login</h2>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <p>Don't have an account? <a href="/register">Sign up</a></p>
</div>
<?php $content = ob_get_clean(); include __DIR__ . '/layout.php'; ?>
