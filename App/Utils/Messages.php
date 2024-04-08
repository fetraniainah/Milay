<?php

namespace App\Milay\Utils;

class Messages extends SessionMaker
{
    const ERROR_KEY = 'error';
    const SUCCESS_KEY = 'success';

    
    public static function setError(string $key, string $message)
    {
        $errors = self::get(self::ERROR_KEY, []);
        $errors[$key] = $message;
        self::set(self::ERROR_KEY, $errors);
    }

   
    public static function getErrors()
    {
        return self::get(self::ERROR_KEY, []);
    }

   
    public static function clearErrors()
    {
        self::forget(self::ERROR_KEY);
    }

  
    public static function setSuccess(string $key, string $message)
    {
        $successes = self::get(self::SUCCESS_KEY, []);
        $successes[$key] = $message;
        self::set(self::SUCCESS_KEY, $successes);
    }

  
    public static function getSuccesses()
    {
        return self::get(self::SUCCESS_KEY, []);
    }

   
    public static function clearSuccesses()
    {
        self::forget(self::SUCCESS_KEY);
    }

 
    public static function destroy($uri)
    {
        parent::destroy($uri);
        self::clearErrors();
        self::clearSuccesses();
    }
}

?>
