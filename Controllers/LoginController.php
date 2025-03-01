<?php
namespace Controllers;

use Lib\AuthJWT;
use SebastianBergmann\Type\VoidType;
use Services\UsersService;
use Lib\Pages;
use Exception;
use Utils\MessageSender;


class LoginController
{
    private UsersService $userService;
    private Pages $pages;
    private AuthJWT $authJWT;


    public function __construct()
    {
        $this->userService = new UsersService();
        $this->pages = new Pages();
        $this->authJWT = new AuthJWT();
    }

    public function loadLogin()
    {
            $this->pages->render('login');
    }

    public function login()
    {
        try {
            $this->userService->login($_POST['email'], $_POST['password']);
            header('Location: /Yoguini_Nana_Shop/');
        } catch (Exception $e) {
            $msg = MessageSender::createMsg('error', $e->getMessage());
                $this->pages->render('login', ['msg' => $msg]);
        }
    }

    public function closeSesion(): Void
    {
        setcookie("JWT", "", time() - 3600, "/");
        setcookie("PHPSESSID", "", time() - 3600, "/");
        header('Location: /Yoguini_Nana_Shop/');
    }
}