<?php
session_start();
require_once "config.php";
spl_autoload_register(function($class) {
    require "controllers/" . $class . ".php";
});
$baseDir = "/banhang/";
$router = [
    'get' => [
        '' => [new SanphamController, 'index'],
        'sp' => [new SanphamController, 'detail'],
        'loai' => [new SanphamController, 'cat'],
        'addtocart' => [new SanphamController, 'addtocart'],
        'showcart' => [new SanphamController, 'showcart'],
        'checkout' => [new SanphamController, 'checkout'],
        'tk' => [new SanphamController, 'searchForm'],
        'register'=> [new UserController, 'register'],
        'login'=> [new UserController, 'login'] ,


        //ADMIN ROUTE
        'admin/sp' => [new AdminSPController, 'index'],
        'admin/addsp' => [new AdminSPController, 'add'],
        'admin/editsp' => [new AdminSPController, 'edit'],
        'admin/deletesp' => [new AdminSPController, 'delete'],

        //ADMIN LOAI
        
        'admin/loai' => [new AdminLoaiController, 'index'],
        'admin/addloai' => [new AdminLoaiController, 'add'],
        'admin/editloai' => [new AdminLoaiController, 'edit'],
        'admin/deleteloai' => [new AdminLoaiController, 'delete'],

        //ADMIN DANG NHAP
        'admin' => [new AdminController, 'index'],
        'admin/login' => [new AdminController, 'login'],
        'admin/logout' => [new AdminController, 'logout'],
    ],
    'post' => [
        'tk' => [new SanphamController, 'searchResult'],
        'checkout_' => [new SanphamController, 'checkout_'],
        'register_'=> [new UserController, 'register_'],
        'login_'=> [new UserController, 'login_'] ,

        //ADMIN ROUTE
        'admin/addsp_' => [new AdminSPController, 'add_'],
        'admin/editsp_' => [new AdminSPController, 'edit_'],

        //ADMIN LOAI
        
        'admin/addloai_' => [new AdminLoaiController, 'add_'],
        'admin/editloai_' => [new AdminLoaiController, 'edit_'],

        //ADMIN DANG NHAP
        'admin/login_' => [new AdminController, 'login_'],
    ]
];
// http://localhost/banhang/Loai?idloai=1&page=3
$path = substr($_SERVER['REQUEST_URI'], strlen($baseDir)); // Lấy đường dẫn
$arr = explode("?", $path); // ['Loai', 'idloai=1&page=3']
$route = strtolower($arr[0]); // /loai
if (count($arr) >= 2) parse_str($arr[1], $params); // [idloai=1, page=3]
else $params = [];

$method = strtolower($_SERVER['REQUEST_METHOD']); // get
if (!array_key_exists($method, $router)) die("Method không phù hợp: " . $method);
if (!array_key_exists($route, $router[$method])) die("Route đã có: " . $route);
$action = $router[$method][$route]; // [0 => SanphamController, 1 => detail]
call_user_func($action);
?>
