<?php
class Database {
    private $host = '127.0.0.1';
    private $db   = 'event_organiser';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    public $conn;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die('DB Connection failed: ' . $e->getMessage());
        }
    }
}
