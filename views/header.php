<?php
require_once '../public/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - Discover. Review. Conquer.</title>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="<?php echo SITE_URL; ?>" class="navbar-logo">⚡ GAMEVAULT</a>

            <button class="mobile-toggle" id="mobileToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="navbar-menu" id="navMenu">
                <ul class="nav-links">
                    <li><a href="<?php echo SITE_URL; ?>/?route=games">Games</a></li>
                    <?php if (isAdmin()): ?>
                        <li><a href="<?php echo SITE_URL; ?>/?route=admin">Admin Panel</a></li>
                    <?php endif; ?>
                </ul>

                <div class="nav-auth">
                    <?php if (isLoggedIn()): ?>
                        <span class="user-greeting">Welcome, <?php echo esc(getCurrentUser()); ?></span>
                        <a href="<?php echo SITE_URL; ?>/?route=logout" class="btn btn-secondary">Logout</a>
                    <?php else: ?>
                        <a href="<?php echo SITE_URL; ?>/?route=login" class="btn btn-secondary">Login</a>
                        <a href="<?php echo SITE_URL; ?>/?route=register" class="btn btn-primary">Register</a>
                    <?php endif; ?>
                    <button class="dark-mode-toggle" id="darkModeToggle">🌙</button>
                </div>
            </div>
        </div>
    </nav>
