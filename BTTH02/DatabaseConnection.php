<?php
class DatabaseConnection {
    private $host = 'localhost';
    private $dbname = 'attendance_management';
    private $port     = '3306';
    private $username = 'root';
    private $password = '127';
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname; port=$this->port;charset=utf8mb4", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
