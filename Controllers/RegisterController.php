<?php
namespace Controllers;

use Lib\AuthJWT;
use Services\UsersService;
use Lib\Pages;
use Exception;
use Utils\MessageSender;

class RegisterController
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

    public function loadRegister(): void
    {
        if (!$this->authJWT->accessState()) {
            $this->pages->render('register');
        } else {
            header('Location: /Yoguini_Nana_Shop/');
        }
    }

    public function createUser(): void
    {
        try {
            $this->userService->createUser($_POST, $_FILES);
            $this->userService->login($_POST['email'], $_POST['pass1']);
            header('Location: /Yoguini_Nana_Shop/');
        } catch (Exception $e) {
            $msg = MessageSender::createMsg('error', $e->getMessage());
            $this->pages->render('register', ['msg' => $msg]);
        }
    }
}