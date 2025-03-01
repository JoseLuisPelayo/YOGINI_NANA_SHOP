<?php
namespace Lib;

use Lib\AuthJWT;

class AuthRolMiddleware
{
    private AuthJWT $jwt;

    public function __construct()
    {
        $this->jwt = new AuthJWT();
    }

    public function handle($request, $next)
    {
        if ($this->jwt->accessState() && $_SESSION['rol'] == 1) {
            return $next($request);
        } else {
            header('Location: /Yoguini_Nana_Shop/');
        }
    }
    
}