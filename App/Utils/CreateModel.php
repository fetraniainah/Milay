<?php

namespace App\Milay\Utils;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateModel extends Command
{
    protected static $defaultName = 'create:model';

    protected function configure()
    {
        $this->setDescription('Create a new model')
             ->addArgument('name', InputArgument::REQUIRED, 'The name of the model');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $modelFileName = __DIR__ . '/../Model/' . $name . '.php';
        $modelContent = "<?php\n\nnamespace App\Milay\Model;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass {$name} extends Model\n{\n    protected \$table = '{$name}s';\n    protected \$fillable = ['column1', 'column2'];\n}";
    
        // Create the model file
        file_put_contents($modelFileName, $modelContent);
    
        $output->writeln("<info>Model $name has created successfully!</info>");
        return Command::SUCCESS;
    }
}
