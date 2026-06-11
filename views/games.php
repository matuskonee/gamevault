<?php
require_once 'header.php';
?>

<main>
    <section class="games-section">
        <div class="container">
            <h1 class="page-title">All Games</h1>

            <!-- Search Bar -->
            <div class="search-bar">
                <form method="GET" action="<?php echo SITE_URL; ?>/?route=games">
                    <input type="text" name="search" placeholder="Search games..." value="<?php echo esc($_GET['search'] ?? ''); ?>" class="search-input">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <!-- Games Grid -->
            <div class="games-grid">
                <?php if (empty($games)): ?>
                    <p class="no-results">No games found</p>
                <?php else: ?>
                    <?php foreach ($games as $g): ?>
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
                                <p class="game-developer"><?php echo esc($g['developer'] ?? 'Unknown'); ?></p>
                                <div class="game-rating">
                                    <span class="stars">★★★★★</span>
                                    <span class="rating-value"><?php echo number_format($g['average_rating'], 1); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once 'footer.php'; ?>
