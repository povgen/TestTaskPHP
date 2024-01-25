<?php
namespace core;
class Route
{
    private static array $routes = [];

    public static function add(string $route, $func): void
    {
        self::$routes[$route] = $func;
    }

    public static function match(string $url)
    {
        if (array_key_exists($url, self::$routes)) {
            return self::$routes[$url];
        }
        return false;
    }

    public static function callMatches(string $url): void
    {
        $match = Route::match($url);
        if (!$match) {
            echo $url.' page not found';
            return;
        }

        if (is_array($match)) $match[0] = new $match[0]();

        call_user_func($match, $_REQUEST);
    }
}