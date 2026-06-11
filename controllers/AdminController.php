<?php

class AdminController {
    private $game;
    private $review;
    private $user;

    public function __construct(Game $game, Review $review, User $user) {
        $this->game = $game;
        $this->review = $review;
        $this->user = $user;

        // Check if user is admin
        if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
            header('Location: ' . SITE_URL);
            exit;
        }
    }

    /**
     * Get dashboard data
     */
    public function getDashboard() {
        return [
            'total_games' => count($this->game->getAll()),
            'total_reviews' => count($this->review->getAll()),
            'total_users' => count($this->user->getAll())
        ];
    }

    /**
     * Create game
     */
    public function createGame() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $genre = trim($_POST['genre'] ?? '');
            $release_date = $_POST['release_date'] ?? '';
            $developer = trim($_POST['developer'] ?? '');
            $image_url = trim($_POST['image_url'] ?? '');

            $error = null;

            if (empty($title) || empty($description) || empty($genre)) {
                $error = 'Title, description, and genre are required';
            } else {
                if ($this->game->create($title, $description, $genre, $release_date ?: null, $developer, $image_url ?: null)) {
                    $_SESSION['success'] = 'Game created successfully';

                    header('Location: ' . SITE_URL . '/admin/games');
                    exit;
        }
                 else {
                    $error = 'Failed to create game';
                }
            }

            return ['error' => $error];
        }

        return [];
    }

    /**
     * Update game
     */
    public function updateGame($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $genre = trim($_POST['genre'] ?? '');
            $release_date = $_POST['release_date'] ?? '';
            $developer = trim($_POST['developer'] ?? '');
            $image_url = trim($_POST['image_url'] ?? '');

            $error = null;

            if (empty($title) || empty($description) || empty($genre)) {
                $error = 'Title, description, and genre are required';
            } else {
                if ($this->game->update($id, $title, $description, $genre, $release_date ?: null, $developer, $image_url ?: null)) {
                    return ['success' => 'Game updated successfully'];
                } else {
                    $error = 'Failed to update game';
                }
            }

            return ['error' => $error];
        }

        return ['game' => $this->game->getById($id)];
    }

    /**
     * Delete game
     */
    public function deleteGame($id) {
        if ($this->game->delete($id)) {
            return ['success' => 'Game deleted successfully'];
        }
        return ['error' => 'Failed to delete game'];
    }

    /**
     * Get all games for admin
     */
    public function getGames() {
        return $this->game->getAll();
    }

    /**
     * Get all users
     */
    public function getUsers() {
        return $this->user->getAll();
    }
}
