<?php
    //Hien thi loi
    ini_set('display_errors', 1);
    error_reporting(E_ALL);



    $controller = isset($_GET['controller']) ? $_GET['controller'] : 'login';
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    
    
    // Kiểm tra sự tồn tại của tệp controller
    $controller = ucfirst($controller);
    $controller .= 'Controller';
    $controllerPath = __DIR__ . '/controllers/' . $controller . '.php';
    
    //Nếu không tồn tại TỆP
    if(!file_exists($controllerPath)){
        die('Tệp tin không tồn tại');
    }
    //Nếu có tồn tại tệp Controller
    require($controllerPath);

    $myObj = new $controller();
    $myObj->$action();
?>