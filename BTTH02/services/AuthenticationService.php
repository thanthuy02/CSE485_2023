<?php
require_once './libs/DatabaseConnection.php';

class AuthenticationService {
    public function __construct() {
  
    }

    public function getUserByEmail($email) {
        $dbConn = new DatabaseConnection();
        $conn = $dbConn->getConnection();
        $query = "SELECT * FROM account WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function authenticate($email, $password) {
        // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu không
        $user = $this->getUserByEmail($email);
        if ($user) {
            // Xác thực mật khẩu
            if ($password === $user['passwordAcc']) {
                // Xác thực thành công
                return $user;
            } else {
                throw new Exception('Incorrect password');
            }
        } else {
            throw new Exception('Email does not exist');
        }
    }
}


?>
