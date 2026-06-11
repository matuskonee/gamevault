<?php

class User {
    private $db;
    private $table = 'users';

    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * Register new user
     */
    public function register($username, $email, $password) {
        // Validate input
        if (empty($username) || empty($email) || empty($password)) {
            return false;
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO {$this->table} (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->query($sql, [$username, $email, $hashed_password]);

        return $stmt !== false;
    }

    /**
     * Login user
     */
    public function login($email, $password) {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        $user = $this->db->fetchOne($sql, [$email]);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    /**
     * Get user by ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    /**
     * Get user by email
     */
    public function getByEmail($email) {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        return $this->db->fetchOne($sql, [$email]);
    }

    /**
     * Get all users
     */
    public function getAll() {
        $sql = "SELECT id, username, email, is_admin, created_at FROM {$this->table} ORDER BY created_at DESC";
        return $this->db->fetchAll($sql);
    }

    /**
     * Update user
     */
    public function update($id, $username, $email) {
        $sql = "UPDATE {$this->table} SET username = ?, email = ? WHERE id = ?";
        return $this->db->query($sql, [$username, $email, $id]) !== false;
    }

    /**
     * Delete user
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->db->query($sql, [$id]) !== false;
    }

    /**
     * Make user admin
     */
    public function makeAdmin($id, $is_admin = true) {
        $sql = "UPDATE {$this->table} SET is_admin = ? WHERE id = ?";
        return $this->db->query($sql, [$is_admin ? 1 : 0, $id]) !== false;
    }
}
