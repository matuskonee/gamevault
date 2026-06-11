<?php
require_once '../views/header.php';
?>

<main>
    <section class="admin-section">
        <div class="container">
            <h1 class="page-title">Admin Dashboard</h1>

            <div class="admin-nav">
                <a href="<?php echo SITE_URL; ?>/admin" class="admin-nav-link active">Dashboard</a>
                <a href="<?php echo SITE_URL; ?>/admin/games" class="admin-nav-link">Games</a>
                <a href="<?php echo SITE_URL; ?>/admin/users" class="admin-nav-link">Users</a>
                <a href="<?php echo SITE_URL; ?>/admin/create-game" class="admin-nav-link">+ Add Game</a>
            </div>

            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3>Total Games</h3>
                    <p class="stat-number"><?php echo $data['total_games']; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Total Reviews</h3>
                    <p class="stat-number"><?php echo $data['total_reviews']; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Total Users</h3>
                    <p class="stat-number"><?php echo $data['total_users']; ?></p>
                </div>
            </div>

            <div class="dashboard-info">
                <h2>Welcome to GameVault Admin Panel</h2>
                <p>Use the navigation above to manage games, reviews, and users.</p>
            </div>
        </div>
    </section>
</main>

<?php require_once '../views/footer.php'; ?>
