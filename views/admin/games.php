<?php
require_once '../views/header.php';
?>

<main>
    <section class="admin-section">
        <div class="container">
            <h1 class="page-title">Manage Games</h1>

            <div class="admin-nav">
                <a href="<?php echo SITE_URL; ?>/admin" class="admin-nav-link">Dashboard</a>
                <a href="<?php echo SITE_URL; ?>/admin/games" class="admin-nav-link active">Games</a>
                <a href="<?php echo SITE_URL; ?>/admin/users" class="admin-nav-link">Users</a>
                <a href="<?php echo SITE_URL; ?>/admin/create-game" class="admin-nav-link">+ Add Game</a>
            </div>

            <div class="admin-content">
                <?php if (!empty($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?= esc($_SESSION['success']) ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <?php if (!empty($_SESSION['error'])): ?>
                    <div class="alert alert-error">
                        <?= esc($_SESSION['error']) ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Genre</th>
                                <th>Developer</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $game): ?>
                                <tr>
                                    <td><?php echo $game['id']; ?></td>
                                    <td><?php echo esc($game['title']); ?></td>
                                    <td><?php echo esc($game['genre']); ?></td>
                                    <td><?php echo esc($game['developer'] ?? 'Unknown'); ?></td>
                                    <td><?php echo number_format($game['average_rating'], 1); ?></td>
                                    <td>
                                        <a href="<?php echo SITE_URL; ?>/admin/<?php echo $game['id']; ?>" class="btn btn-sm">Edit</a>
                                        <a href="<?php echo SITE_URL; ?>/admin/delete/<?php echo $game['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once '../views/footer.php'; ?>
