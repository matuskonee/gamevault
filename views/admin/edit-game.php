<?php
require_once '../views/header.php';

if (!isset($data['game']) || !$data['game']) {
    require_once '../404.php';
    exit;
}
?>

<main>
    <section class="admin-section">
        <div class="container">
            <h1 class="page-title">Edit Game</h1>

            <div class="admin-nav">
                <a href="<?php echo SITE_URL; ?>/admin" class="admin-nav-link">Dashboard</a>
                <a href="<?php echo SITE_URL; ?>/admin/games" class="admin-nav-link">Games</a>
                <a href="<?php echo SITE_URL; ?>/admin/users" class="admin-nav-link">Users</a>
                <a href="<?php echo SITE_URL; ?>/admin/create-game" class="admin-nav-link">+ Add Game</a>
            </div>

            <div class="admin-form-container">
                <?php if (!empty($data['error'])): ?>
                    <div class="alert alert-error"><?php echo esc($data['error']); ?></div>
                <?php endif; ?>

                <?php if (!empty($data['success'])): ?>
                    <div class="alert alert-success"><?php echo esc($data['success']); ?></div>
                <?php endif; ?>

                <form method="POST" class="admin-form">
                    <div class="form-group">
                        <label for="title">Game Title</label>
                        <input type="text" id="title" name="title" value="<?php echo esc($data['game']['title']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5" required><?php echo esc($data['game']['description']); ?></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" id="genre" name="genre" value="<?php echo esc($data['game']['genre']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="developer">Developer</label>
                            <input type="text" id="developer" name="developer" value="<?php echo esc($data['game']['developer'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="release_date">Release Date</label>
                            <input type="date" id="release_date" name="release_date" value="<?php echo esc($data['game']['release_date'] ?? ''); ?>">
                        </div>

                        <div class="form-group">
                            <label for="image_url">Image URL</label>
                            <input type="url" id="image_url" name="image_url" value="<?php echo esc($data['game']['image_url'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Game</button>
                        <a href="<?php echo SITE_URL; ?>/admin/games" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php require_once '../views/footer.php'; ?>
