<?php
namespace Lib;

// class Router
// {
//     private static $routes = [];

//     public static function add(string $method, string $action, callable $controller)
//     {
//         $action = trim($action, "/");
//         self::$routes[$method][$action] = $controller;
//     }

//     public static function dispatch(): void
//     {
//         $method = $_SERVER['REQUEST_METHOD'];
//         $action = preg_replace('/Yoguini_Nana_Shop/', '', $_SERVER['REQUEST_URI']);
//         $action = trim($action, "/");

//         $param = null;
//         preg_match('/[0-9]+$/', $action, $match);
//         if (!empty($match)) {
//             $param = $match[0];
//             $action =  preg_replace('/' . $match[0] . '/', ':id', $action);
//         }

//         $callback = self::$routes[$method][$action];
//         echo call_user_func($callback, $param);
//     }




class Router
{
    private static $routes = [];
    private static $globalMiddlewares = [];

    public static function addGlobalMiddleware(callable $middleware)
    {
        self::$globalMiddlewares[] = $middleware;
    }

    // private static function handleMiddlewares($request, callable $controller, array $middlewares)
    // {
    //     $allMiddlewares = array_merge(self::$globalMiddlewares, $middlewares);

    //     $handler = array_reduce(array_reverse($allMiddlewares), function ($next, $middleware) {
    //         return function ($request) use ($middleware, $next) {
    //             if (!is_callable($next)) {
    //                 throw new \Exception("Next handler is not callable");
    //             }
    //             return $middleware->handle($request, $next);
    //         };
    //     }, $controller);

    //     return $handler($request);
    // }
    private static function handleMiddlewares($request, callable $controller, array $middlewares)
    {
        $allMiddlewares = array_merge(self::$globalMiddlewares, $middlewares);

        $handler = array_reduce(array_reverse($allMiddlewares), function ($next, $middleware) {
            return function ($request) use ($middleware, $next) {
                if (!is_callable([$middleware, 'handle'])) {
                    throw new \Exception("Middleware handle method is not callable");
                }
                return $middleware->handle($request, $next);
            };
        }, $controller);

        return $handler($request);
    }

    public static function add(string $method, string $action, callable $controller, array $middlewares = [])
    {
        $action = trim($action, "/");
        self::$routes[$method][$action] = ['controller' => $controller, 'middlewares' => $middlewares];
    }

    public static function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = preg_replace('/Yoguini_Nana_Shop/', '', $_SERVER['REQUEST_URI']);
        $action = trim($action, "/");

        if (!isset(self::$routes[$method])) {
            echo "404 Not Found";
            return;
        }

        foreach (self::$routes[$method] as $route => $callback) {
            $pattern = "@^" . preg_replace('/:\w+/', '([^/]+)', $route) . "$@";
            if (preg_match($pattern, $action, $matches)) {
                array_shift($matches); // El primer elemento es la URL completa
                $request = $matches; // Asignar el resto de los matches al request
                $controller = $callback['controller'];
                $middlewares = $callback['middlewares'];
                return self::handleMiddlewares($request, function ($request) use ($controller) {
                    return call_user_func_array($controller, $request);
                }, $middlewares);
            }
        }
        // Si no se encuentra ninguna ruta, puedes manejarlo aquí
        echo "404 Not Found";
    }

}
