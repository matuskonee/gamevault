<?php
require_once 'header.php';

if (!isset($data) || !$data) {
    require_once '404.php';
    exit;
}

$game = $data;
$reviews = $game['reviews'] ?? [];
$avgRating = $game['average_rating'] ?? 0;
?>

<main>
    <section class="game-detail-section">
        <div class="container">
            <a href="<?php echo SITE_URL; ?>/?route=games" class="back-link">← Back to Games</a>

            <div class="game-detail-content">
                <div class="game-detail-image">
                    <img src="<?php echo esc($game['image_url'] ?? 'https://via.placeholder.com/500x600'); ?>" alt="<?php echo esc($game['title']); ?>">
                </div>

                <div class="game-detail-info">
                    <h1><?php echo esc($game['title']); ?></h1>
                    <p class="game-detail-genre">Genre: <strong><?php echo esc($game['genre']); ?></strong></p>
                    <p class="game-detail-developer">Developer: <strong><?php echo esc($game['developer'] ?? 'Unknown'); ?></strong></p>
                    <p class="game-detail-date">Release Date: <strong><?php echo esc($game['release_date'] ?? 'N/A'); ?></strong></p>

                    <div class="rating-section">
                        <h3>Average Rating</h3>
                        <div class="rating-display">
                            <span class="large-rating"><?php echo number_format($avgRating, 1); ?></span>
                            <span class="stars">★★★★★</span>
                        </div>
                    </div>

                    <div class="game-description">
                        <h3>Description</h3>
                        <p><?php echo nl2br(esc($game['description'])); ?></p>
                    </div>

                    <?php if (isLoggedIn()): ?>
                        <button class="btn btn-primary" onclick="toggleReviewForm()">Leave a Review</button>
                    <?php else: ?>
                        <p class="login-prompt"><a href="<?php echo SITE_URL; ?>/?route=login">Log in</a> to leave a review</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="reviews-section">
                <h2>Reviews (<?php echo count($reviews); ?>)</h2>

                <?php if (isLoggedIn()): ?>
                    <div class="review-form" id="reviewForm" style="display: none;">
                        <h3>Add Your Review</h3>
                        <form method="POST">
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select id="rating" name="rating" required>
                                    <option value="">Select rating</option>
                                    <option value="5">5 Stars - Excellent</option>
                                    <option value="4">4 Stars - Good</option>
                                    <option value="3">3 Stars - Average</option>
                                    <option value="2">2 Stars - Poor</option>
                                    <option value="1">1 Star - Terrible</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Your Review</label>
                                <textarea id="comment" name="comment" rows="4" placeholder="Share your thoughts..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                            <button type="button" class="btn btn-secondary" onclick="toggleReviewForm()">Cancel</button>
                        </form>
                    </div>
                <?php endif; ?>

                <div class="reviews-list">
                    <?php if (empty($reviews)): ?>
                        <p class="no-reviews">No reviews yet. Be the first to review!</p>
                    <?php else: ?>
                        <?php foreach ($reviews as $review): ?>
                            <div class="review-item">
                                <div class="review-header">
                                    <strong><?php echo esc($review['username']); ?></strong>
                                    <span class="review-rating">★★★★★ <?php echo $review['rating']; ?>/5</span>
                                </div>
                                <p class="review-date"><?php echo date('M d, Y', strtotime($review['created_at'])); ?></p>
                                <p class="review-comment"><?php echo nl2br(esc($review['comment'] ?? '')); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
function toggleReviewForm() {
    const form = document.getElementById('reviewForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}
</script>

<?php require_once 'footer.php'; ?>
