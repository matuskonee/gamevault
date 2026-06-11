<?php
class Database {
    private $pdo;

    public function __construct() {
        try {
            if (!in_array('mysql', PDO::getAvailableDrivers(), true) && !in_array('sqlite', PDO::getAvailableDrivers(), true)) {
                die('Database Error: No PDO database drivers are available. Use XAMPP PHP or enable pdo_mysql/pdo_sqlite in php.ini.');
            }

            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', DB_HOST, DB_NAME);
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Database Error: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }

    public function fetchOne($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    public function prepare($query) {
        return $this->pdo->prepare($query);
    }
}
?>