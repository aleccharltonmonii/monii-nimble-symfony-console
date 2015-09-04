<?php

namespace Monii\Nimble\Symfony\Console\Tests\ArrayConfigured;

use Monii\Nimble\Symfony\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use function Monii\Nimble\Symfony\Console\containerize_command;

class WithArgumentsCommand extends Command
{
    protected $name = 'array-configured:with-arguments-command';

    protected $description = 'Tests arguments';

    public function __construct()
    {
        parent::__construct();
    }

    public function getArguments()
    {
        return [
            new InputArgument('a', InputArgument::REQUIRED, ''),
            new InputArgument('b', InputArgument::REQUIRED, ''),
            new InputArgument('c', InputArgument::REQUIRED, '')
        ];
    }

    public function handle()
    {
        print $this->argument('a') . ', ' . $this->argument('b') . ', ' . $this->argument('c');
    }
}
