<?php

class Game {
    private $db;
    private $table = 'games';

    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Create game
     */
    public function create($title, $description, $genre, $release_date, $developer, $image_url = null) {
        $sql = "INSERT INTO {$this->table} (title, description, genre, release_date, developer, image_url) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql, [$title, $description, $genre, $release_date, $developer, $image_url]);
        return $stmt !== false ? $this->db->lastInsertId() : false;
    }

    /**
     * Get game by ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    /**
     * Get all games
     */
    public function getAll() {
    $sql = "
        SELECT g.*,
               COALESCE(AVG(r.rating), 0) AS average_rating
        FROM games g
        LEFT JOIN reviews r ON g.id = r.game_id
        GROUP BY g.id
        ORDER BY g.created_at DESC
    ";

    return $this->db->fetchAll($sql);
    }

    /**
     * Get games by genre
     */
    public function getByGenre($genre) {
        $sql = "SELECT * FROM {$this->table} WHERE genre = ? ORDER BY created_at DESC";
        return $this->db->fetchAll($sql, [$genre]);
    }

    /**
     * Search games
     */
    public function search($keyword) {
    $searchTerm = '%' . $keyword . '%';

    $sql = "
        SELECT g.*,
               COALESCE(AVG(r.rating), 0) AS average_rating
        FROM games g
        LEFT JOIN reviews r ON g.id = r.game_id
        WHERE g.title LIKE ? OR g.description LIKE ?
        GROUP BY g.id
        ORDER BY g.created_at DESC
    ";

    return $this->db->fetchAll($sql, [$searchTerm, $searchTerm]);
    }

    /**
     * Update game
     */
    public function update($id, $title, $description, $genre, $release_date, $developer, $image_url = null) {
        $sql = "UPDATE {$this->table} SET title = ?, description = ?, genre = ?, release_date = ?, developer = ?, image_url = ? WHERE id = ?";
        return $this->db->query($sql, [$title, $description, $genre, $release_date, $developer, $image_url, $id]) !== false;
    }

    /**
     * Delete game
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->db->query($sql, [$id]) !== false;
    }

    /**
     * Get genres
     */
    public function getGenres() {
        $sql = "SELECT DISTINCT genre FROM {$this->table} ORDER BY genre";
        return $this->db->fetchAll($sql);
    }
}
