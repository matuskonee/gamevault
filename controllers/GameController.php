<?php

class GameController {
    private $game;
    private $review;

    public function __construct(Game $game, Review $review) {
        $this->game = $game;
        $this->review = $review;
    }

    /**
     * Get all games
     */
    public function getAllGames() {
        return $this->game->getAll();
    }

    /**
     * Get game detail
     */
    public function getGameDetail($id) {

    $game = $this->game->getById($id);

    if (!$game) {
        return null;
    }

    // Uloženie review
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {

        $rating = (int)($_POST['rating'] ?? 0);
        $comment = trim($_POST['comment'] ?? '');

        if ($rating >= 1 && $rating <= 5) {

            $this->review->create(
                $id,
                $_SESSION['user_id'],
                $rating,
                $comment
            );

            header('Location: ' . SITE_URL . '/games/' . $id);
            exit;
        }
    }

    $game['reviews'] = $this->review->getByGame($id);
    $game['average_rating'] = $this->review->getAverageRating($id);

    return $game;
}

    /**
     * Search games
     */
    public function searchGames($keyword) {
        if (empty($keyword)) {
            return $this->getAllGames();
        }
        return $this->game->search($keyword);
    }
}
