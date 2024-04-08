<?php

namespace App\Milay\Utils;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateController extends Command
{
    protected static $defaultName = 'create:controller';

    protected function configure()
    {
        $this->setDescription('Create a new controller')
             ->addArgument('name', InputArgument::REQUIRED, 'The name of the controller');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $controllerFileName = __DIR__ . '/../Controller/' . $name . 'Controller.php';
        $controllerContent = "<?php\n\nnamespace App\Milay\Controller;\n\nuse Symfony\Component\HttpFoundation\Request;\n\nclass {$name}Controller\n{\n";
        $controllerContent .= "    public function index()\n    {\n        // Your index method code here\n    }\n\n";
        $controllerContent .= "    public function show(\$id)\n    {\n        // Your show method code here\n    }\n\n";
        $controllerContent .= "    public function store(Request \$request)\n    {\n        // Your store method code here\n    }\n\n";
        $controllerContent .= "    public function update(Request \$request, \$id)\n    {\n        // Your update method code here\n    }\n\n";
        $controllerContent .= "    public function delete(\$id)\n    {\n        // Your delete method code here\n    }\n}";
        
        // Create the controller file
        file_put_contents($controllerFileName, $controllerContent);
    
        $output->writeln("<info>Controller $name has been created successfully with :\n  index \n  show \n  store\n  update\n  delete\n  Success!</info>");
        return Command::SUCCESS;
    }
}

?>
