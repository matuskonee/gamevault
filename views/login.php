<?php
require_once 'header.php';
?>

<main>
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-box">
                <h1>Login</h1>

                <?php if (!empty($data['error'])): ?>
                    <div class="alert alert-error"><?php echo esc($data['error']); ?></div>
                <?php endif; ?>

                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="alert alert-success"><?php echo esc($_SESSION['success']); unset($_SESSION['success']); ?></div>
                <?php endif; ?>

                <form method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>

                <p class="auth-link">Don't have an account? <a href="<?php echo SITE_URL; ?>/?route=register">Register here</a></p>
            </div>
        </div>
    </section>
</main>

<?php require_once 'footer.php'; ?>
