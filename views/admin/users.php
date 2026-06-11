<?php
require_once '../views/header.php';
?>

<main>
    <section class="admin-section">
        <div class="container">
            <h1 class="page-title">Manage Users</h1>

            <div class="admin-nav">
                <a href="<?php echo SITE_URL; ?>/admin" class="admin-nav-link">Dashboard</a>
                <a href="<?php echo SITE_URL; ?>/admin/games" class="admin-nav-link">Games</a>
                <a href="<?php echo SITE_URL; ?>/admin/users" class="admin-nav-link active">Users</a>
                <a href="<?php echo SITE_URL; ?>/admin/create-game" class="admin-nav-link">+ Add Game</a>
            </div>

            <div class="admin-content">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $user): ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo esc($user['username']); ?></td>
                                    <td><?php echo esc($user['email']); ?></td>
                                    <td><?php echo $user['is_admin'] ? 'Yes' : 'No'; ?></td>
                                    <td><?php echo date('M d, Y', strtotime($user['created_at'])); ?></td>
                                    <td>
                                        <a href="<?php echo SITE_URL; ?>/admin/user/<?php echo $user['id']; ?>" class="btn btn-sm">Edit</a>
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
