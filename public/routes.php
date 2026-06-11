<?php
// Review submission handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    if (!isLoggedIn()) {
        header('Location: ' . SITE_URL . '/login');
        exit;
    }

    $rating = (int)$_POST['rating'];
    $comment = trim($_POST['comment'] ?? '');
    $game_id = (int)$parts[1];
    $user_id = $_SESSION['user_id'];

    if ($rating >= 1 && $rating <= 5) {
        if ($review->create($game_id, $user_id, $rating, $comment)) {
            $_SESSION['success'] = 'Review submitted successfully!';
            header('Location: ' . SITE_URL . '/games/' . $game_id);
            exit;
        }
    }
}

// Game deletion handler
if ($page === 'admin' && isset($parts[1]) && $parts[1] === 'delete' && isset($parts[2])) {
    if (!isAdmin()) {
        header('Location: ' . SITE_URL);
        exit;
    }

    $adminController = new AdminController($game, $review, $user);
    $result = $adminController->deleteGame((int)$parts[2]);
    $_SESSION['success'] = 'Game deleted successfully!';
    header('Location: ' . SITE_URL . '/admin/games');
    exit;
}
