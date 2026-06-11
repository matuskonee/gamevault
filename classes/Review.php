<?php

class Review {
    private $db;
    private $table = 'reviews';

    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Create review
     */
    public function create($game_id, $user_id, $rating, $comment = null) {
        // Validate rating
        if ($rating < 1 || $rating > 5) {
            return false;
        }

        $sql = "INSERT INTO {$this->table} (game_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->query($sql, [$game_id, $user_id, $rating, $comment]);
        return $stmt !== false ? $this->db->lastInsertId() : false;
    }

    /**
     * Get review by ID
     */
    public function getById($id) {
        $sql = "SELECT r.*, u.username, g.title FROM {$this->table} r 
                JOIN users u ON r.user_id = u.id 
                JOIN games g ON r.game_id = g.id 
                WHERE r.id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    /**
     * Get reviews by game
     */
    public function getByGame($game_id) {
        $sql = "SELECT r.*, u.username FROM {$this->table} r 
                JOIN users u ON r.user_id = u.id 
                WHERE r.game_id = ? 
                ORDER BY r.created_at DESC";
        return $this->db->fetchAll($sql, [$game_id]);
    }

    /**
     * Get reviews by user
     */
    public function getByUser($user_id) {
        $sql = "SELECT r.*, g.title FROM {$this->table} r 
                JOIN games g ON r.game_id = g.id 
                WHERE r.user_id = ? 
                ORDER BY r.created_at DESC";
        return $this->db->fetchAll($sql, [$user_id]);
    }

    /**
     * Update review
     */
    public function update($id, $rating, $comment = null) {
        if ($rating < 1 || $rating > 5) {
            return false;
        }

        $sql = "UPDATE {$this->table} SET rating = ?, comment = ? WHERE id = ?";
        return $this->db->query($sql, [$rating, $comment, $id]) !== false;
    }

    /**
     * Delete review
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->db->query($sql, [$id]) !== false;
    }

    /**
     * Get average rating for game
     */
    public function getAverageRating($game_id) {
        $sql = "SELECT AVG(rating) as avg_rating FROM {$this->table} WHERE game_id = ?";
        $result = $this->db->fetchOne($sql, [$game_id]);
        return $result['avg_rating'] ? round($result['avg_rating'], 1) : 0;
    }
    /**
    * Get all reviews
    */
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->db->fetchAll($sql);
    }
}
