<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'tienda');

define('CATEGORIES', [
    'moda' => '1',
    'zafus' => '2',
    'esterillas' => '3',
    'mantas' => '4',
    'accesorios' => '5',
    'meditacion' => '6'
]);

define('ROUTES', [
    'index' => [
        'route' => '',
        'css' => ['swiper-bundle.min.css', '.css'],
        'js' => ['swiper-bundle.min.js', '.js']
    ],
    'user.register' => [
        'route' => 'user/register',
        'css' => ['user/register.css'],
        'js' => ['user/register.js']
    ],
    'user.login' => [
        'route' =>'user/login',
        'css' => ['user/login.css'],
        'js' => []
    ],
    'user.myaccount' => [
        'route' =>'user/myaccount',
        'css' => ['user/myaccount.css'],
        'js' => []
    ],
    'products' => [
        'route' =>'products',
        'css' => ['products.css'],
        'js' => ['products.js']
    ],
    'products.category' => [
        'route' =>'products/:category',
        'css' => ['products.css'],
        'js' => ['products.js']
    ],
    'products.detail' => [
        'route' => 'products/detail/:id',
        'css' => ['swiper-bundle.min.css', 'productDetail.css'],
        'js' => ['swiper-bundle.min.js', 'productDetail.js']
    ],
    'cart' => [
        'route' => 'cart',
        'css' => ['cart.css'],
        'js' => []
    ]
]);