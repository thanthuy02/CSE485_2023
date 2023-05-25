<?php
require_once 'models/Account.php';
require_once 'services/AuthenticationService.php';

class LoginController {
    private $authenticationService;

    public function __construct() {
        $this->authenticationService = new AuthenticationService();
        session_start();
        
    }

    public function index() {

        // Load view đăng nhập và truyền các biến cần thiết
        $error = isset($_GET['error']) ? $_GET['error'] : '';
        require 'views/login.php';
    }

    public function login(){
        // Xử lý yêu cầu đăng nhập từ người dùng
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];



            try {
                // Xác thực thông qua service
                $user = $this->authenticationService->authenticate($email, $password);

                // Lưu accID vào session
                $_SESSION['accID'] = $user['accID'];    
                // Chuyển hướng người dùng đến trang tương ứng với role
                if ($user['role'] === 'instructor') {
                    // Chuyển hướng đến trang instructor
                    header('Location: ?controller=instructor');
                    exit;
                } else {
                    // Chuyển hướng đến trang student
                    header('Location: ?controller=student');
                    exit;
                }

            } catch (Exception $e) {
                // Xác thực không thành công, chuyển hướng đến trang đăng nhập với thông báo lỗi
                header('Location: ?controller=Login&action=index&error=' . urlencode($e->getMessage()));
                exit();
            }
        }
    }
}
