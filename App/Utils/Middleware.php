<?php 
namespace App\Milay\Utils;

class Middleware
{
    public static function apply(array $middlewares): void
    {
        foreach ($middlewares as $middleware) {
            if (is_callable($middleware)) {
                call_user_func($middleware);
            } elseif (is_string($middleware) && method_exists(__CLASS__, $middleware)) {
                self::$middleware();
            }
        }
    }

    public static function auth(): void
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
    }

    public static function admin():void
    {
        return;
    }

    public static function guest(){
        return;
    }

    public static function verify():void
    {
        return;
    }

   
}













?>