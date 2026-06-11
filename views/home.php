<?php
require_once 'header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">GAMEVAULT</h1>
            <p class="hero-subtitle">Discover. Review. Conquer.</p>
            <div class="hero-buttons">
                <a href="<?php echo SITE_URL; ?>/?route=games" class="btn btn-primary">Explore Games</a>
                <?php if (!isLoggedIn()): ?>
                    <a href="<?php echo SITE_URL; ?>/?route=login" class="btn btn-secondary">Login</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="hero-background"></div>
    </section>

    <!-- Featured Games -->
    <section class="featured-section">
        <div class="container">
            <h2 class="section-title">Featured Games</h2>
            <div class="games-grid">
                <?php foreach (array_slice($games, 0, 6) as $g): ?>
                    <div class="game-card">
                        <div class="game-image">
                            <img src="<?php echo esc($g['image_url'] ?? 'https://via.placeholder.com/300x400'); ?>" alt="<?php echo esc($g['title']); ?>">
                            <div class="game-overlay">
                                <a href="<?php echo SITE_URL; ?>/?route=games/<?php echo $g['id']; ?>" class="btn btn-sm">View Details</a>
                            </div>
                        </div>
                        <div class="game-info">
                            <h3><?php echo esc($g['title']); ?></h3>
                            <p class="game-genre"><?php echo esc($g['genre']); ?></p>
                            <div class="game-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-value">
                                    <?php echo number_format($g['average_rating'], 1); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once 'footer.php'; ?>
