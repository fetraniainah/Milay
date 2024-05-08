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
        $isLogged = SessionMaker::get("isLogged");
        if (!$isLogged) {
            header("Location: /admin/auth/login");
            exit;
        }
    }

    public static function admin():void
    {
        $isLogged = SessionMaker::get("isLogged");
        $userRole = SessionMaker::get("user_roles");

    if (!$isLogged || $userRole !== 'admin') {
        header("Location: /admin/auth/login");
        exit;
    }
        
    }

    public static function guest(){
        $isLogged = SessionMaker::get("isLogged");

        if ($isLogged) {
            header("Location: /admin/home");
            exit;
        }
    }

    public static function verify():void
    {
        return;
    }

   
}













?>