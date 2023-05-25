<?php
class DatabaseConnection {
    private $host;
    private $dbname;
    private $port; 
    private $username;
    private $password;
    private $connection;

    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = 'attendance-management';
        $this->port = '3306';
        $this->username = 'root';
        $this->password = '127';
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
