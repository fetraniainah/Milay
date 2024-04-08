<?php 
namespace App\Milay\Config;

class View
{
    private function __construct()
    {
    }

    public static function render(string $viewName, array $data = []): void
    {
        extract($data);
        include_once __DIR__ . "/../../views/{$viewName}.php";
    }

    public static function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }

    public static function back(): void
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: {$referer}");
        exit;
    }
}













?>