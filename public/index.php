<?php
    define('ROOT', __DIR__ . "/../");
    require(ROOT.'libs/functions.php');

    // 自动加载类
    function autoload($class){
        $path = str_replace('\\','/',$class);
        require(ROOT . $path . '.php');
    }

    spl_autoload_register('autoload');

// 解析路由
$controller = "\controllers\IndexController";
$action = "index";
if(isset($_SERVER['PATH_INFO'])){
    $route = explode('/',$_SERVER['PATH_INFO']);
    // 拼写控制器
    $controller = "\controllers\\".ucfirst($route[1].'controller');
    $action = $route[2];
}
$C = new $controller;
$C->$action();
