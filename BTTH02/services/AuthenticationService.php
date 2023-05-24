<?php
class AuthenticationService {
    private $accountModel;

    public function __construct($accountModel) {
        $this->accountModel = $accountModel;
    }

    public function authenticate($email, $password) {
        // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu không
        $user = $this->accountModel->getUserByEmail($email);
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
