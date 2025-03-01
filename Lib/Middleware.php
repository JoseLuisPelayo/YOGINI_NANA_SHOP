<?php
namespace Lib;

use Lib\AuthJWT;

class Middleware
{
    private AuthJWT $jwt;

    public function __construct()
    {
        $this->jwt = new AuthJWT();
    }

    public function handle($request, $next)
    {
        if (!is_callable($next)) {
            throw new \Exception("Next handler is not callable in middleware");
        }
        
        if ($this->jwt->accessState()) {
            return $next($request);
        } else {
            header('Location: /Yoguini_Nana_Shop/');
            exit();
        }
    }
    
}