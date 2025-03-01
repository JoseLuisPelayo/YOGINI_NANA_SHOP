<?php
namespace Controllers;

use Lib\AuthJWT;
use Services\CartService;
use Services\ProductsService;
use Services\UsersService;
use Lib\Pages;


class CartController
{
    private UsersService $service;
    private Pages $pages;
    private AuthJWT $authJWT;
    private ProductsService $productsService;
    private CartService $cartService;

    public function __construct()
    {
        $this->service = new UsersService();
        $this->productsService = new ProductsService();
        $this->cartService = new CartService();
        $this->pages = new Pages();
        $this->authJWT = new AuthJWT();
    }


    public function load()
    {
        $products = $this->productsService->findProductsByIds($_SESSION['cart']);
        $products = $this->cartService->countProducts();            
        $user = (isset($_SESSION['email'])) ?  $this->service->findUserByEmail($_SESSION['email']) : null;
        $this->pages->render('cart', ['user' => $user, 'products' => $products]);
    }
}