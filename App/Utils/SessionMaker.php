<?php

namespace App\Milay\Utils;

class SessionMaker
{
    
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    
    public static function set(string $key, $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }

   
    public static function get(string $key, $default = null)
    {
        self::start();
        return $_SESSION[$key] ?? $default;
    }


    public static function forget(string $key)
    {
        self::start();
        unset($_SESSION[$key]);
    }

   
    public static function destroy($uri)
    {
        self::start();
        session_unset();
        session_destroy();
        header("Location:$uri");
    }
}

?>
