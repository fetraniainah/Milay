<?php
require __DIR__.'/vendor/autoload.php';
use App\Milay\Utils\CreateController;
use App\Milay\Utils\CreateModel;
use Symfony\Component\Console\Application;
$command = new Application();
$command->add(new CreateController());
$command->add(new CreateModel());
$command->run();
?>