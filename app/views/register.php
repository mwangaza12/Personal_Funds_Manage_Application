<?php ob_start(); ?>
<div class="login-container">
    <h2>Register</h2>
    <form method="post">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Register">
    </form>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <p>Already have an account? <a href="/login">Login</a></p>
</div>

<?php $content = ob_get_clean(); include __DIR__ . '/layout.php'; ?>
