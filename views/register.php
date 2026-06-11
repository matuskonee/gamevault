<?php
require_once 'header.php';
?>

<main>
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-box">
                <h1>Register</h1>

                <?php if (!empty($data['error'])): ?>
                    <div class="alert alert-error"><?php echo esc($data['error']); ?></div>
                <?php endif; ?>

                <form method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>

                <p class="auth-link">Already have an account? <a href="<?php echo SITE_URL; ?>/?route=login">Login here</a></p>
            </div>
        </div>
    </section>
</main>

<?php require_once 'footer.php'; ?>
