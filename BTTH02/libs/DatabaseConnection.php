<?php
require_once './config/config.php';
class DatabaseConnection {
<<<<<<< HEAD:BTTH02/DatabaseConnection.php
    private $host = 'localhost';
    private $dbname = 'attendance_management';
    private $port     = '3306'; 
    private $username = 'root';
    private $password = 'thuy123';
=======
    private $host;
    private $dbname;
    private $port; 
    private $username;
    private $password;
>>>>>>> 14af6b0841c4499e625b4efdd8fb4143d10c812a:BTTH02/libs/DatabaseConnection.php
    private $connection;

    public function __construct() {
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->port = DB_POST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
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
