<?php
require_once "inc/autoloader.php";
require_once "./vendor/autoload.php";
require_once "config.php";

use Controllers\ProductsContoller;
use Controllers\HomeController;
use Controllers\LoginController;
use Controllers\RegisterController;
use Controllers\AccountController;
use Controllers\CartController;
use Lib\Middleware;
use Lib\AuthRolMiddleware;
use Lib\Router;

session_start();
ob_start();

$userMiddleware = new Middleware();
$authRolMiddleware = new authRolMiddleware();

Router::add('GET', '/', function () {
    return (new HomeController())->load();
});

Router::add('GET', '/user/register', function () {
    return (new RegisterController())->loadRegister();
});

Router::add('POST', '/user/register', function () {
    return (new RegisterController())->createUser();
});

Router::add('GET', '/user/login', function () {
    return (new LoginController())->loadLogin();
});

Router::add('POST', '/user/login', function () {
    return (new LoginController())->login();
});

Router::add('GET', '/user/close_sesion', function () {
    return (new LoginController())->closeSesion();
});

Router::add('GET', '/products', function() {
    return (new ProductsContoller())->load();
});

Router::add('POST', '/products/:id', function($id) {
    return (new ProductsContoller())->addProductToCart($id);
});

Router::add('GET', '/cart', function () {
    return (new CartController())->load();
});


Router::add('GET', '/products/:category', function($category) {
    return (new ProductsContoller())->listCategory($category);
});

Router::add('GET', '/products/detail/:id', function($id) {
    return (new ProductsContoller())->detail($id);
});

//Rutas protegias por Autenticacion
Router::add('GET', '/user/myaccount', function () {
    return (new AccountController())->load();
}, [$userMiddleware]);

Router::add('POST', '/user/myaccount', function () {
    return (new AccountController())->update();
}, [$userMiddleware]);

//Rutas protegidas por rol
Router::add('GET', '/admin', function () {
    echo 'El enrutador funciona';
},[$authRolMiddleware]);


try {
Router::dispatch();
} catch (Exception $e) {
    // Manejar la excepción y mostrar un mensaje de error
    echo "Se ha producido un error: " . $e->getMessage();
}





