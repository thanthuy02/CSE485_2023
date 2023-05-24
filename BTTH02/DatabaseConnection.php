<?php
class DatabaseConnection {
    private $host = 'localhost';
    private $dbname = 'attendance-management';
    private $port     = '3306'; 
    private $username = 'root';
    private $password = '0210';
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname;$this->port=port;charset=utf8mb4", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
