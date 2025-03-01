<?php
namespace Utils;

class ResourcesLoader
{
    public static function resourceLoad(string $currentPath, array $routes, string $resourceType): ?array
    {
        foreach ($routes as $route => $resources) {
            $routePattern = preg_replace('/:\w+/', '([^/]+)', $resources['route']);
            if (preg_match('@^' . $routePattern . '$@', $currentPath, $matches)) {
                return $resources[$resourceType];
            }
        }
        return null;
    }

}