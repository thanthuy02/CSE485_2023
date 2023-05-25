<?php
class Account {
    private $accID;
    private $email;
    private $password;
    private $role;


    public function __construct($accID, $email,$password, $role) {
        $this->accID = $accID;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;

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
}
?>
