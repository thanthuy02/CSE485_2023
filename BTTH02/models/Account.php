<?php
require_once 'DatabaseConnection.php';

class Account {
    private $accID;
    private $email;
    private $password;
    private $role;
    private $db;

    public function __construct() {
        $dbConnection = new DatabaseConnection();
        $this->db = $dbConnection->getConnection();
    }

    public function getAccID() {
        return $this->accID;
    }

    public function setAccID($accID) {
        $this->accID = $accID;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM account WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
?>
