<?php
namespace Controllers;

use Lib\AuthJWT;
use Services\ShippingAddressService;
use Services\UsersService;
use Lib\Pages;
use Exception;
use Utils\MessageSender;


class AccountController
{
    private UsersService $userService;
    private ShippingAddressService $addressService;
    private Pages $pages;
    private AuthJWT $authJWT;


    public function __construct()
    {
        $this->userService = new UsersService();
        $this->addressService = new ShippingAddressService();
        $this->pages = new Pages();
        $this->authJWT = new AuthJWT();
    }

    public function load()
    {
        $user = $this->userService->findUserByEmail($_SESSION['email']);
        $direction = $this->addressService->getMainAddressByUserId($user->getId());
        $this->pages->render('myAccount', ['user' => $user, 'direction' => $direction]);
    }

    public function update()
    {
        try {
            $user = $this->userService->findUserByEmail($_SESSION['email']);
            $direction = $this->addressService->getMainAddressByUserId($user->getId());

            $this->userService->updateUser($_POST, $_FILES, $user);
            $this->addressService->updateMainShippingAddress($user->getId(), $_POST);

            header('Location: /Yoguini_Nana_Shop/user/myaccount');
        } catch (Exception $e) {
            $user = $this->userService->findUserByEmail($_SESSION['email']);
            $direction = $this->addressService->getMainAddressByUserId($user->getId());

            $msg = MessageSender::createMsg('error', $e->getMessage());
            $this->pages->render('myAccount', [
                'msg' => $msg,
                'user' => $user,
                'direction' => $direction
            ]);
        }
    }
}