<?php

namespace Monii\Nimble\Symfony\Console\Tests\ArrayConfigured;

use Monii\Nimble\Symfony\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use function Monii\Nimble\Symfony\Console\containerize_command;

class WithBothArgumentsAndOptionsCommand extends Command
{
    protected $name = 'array-configured:with-both-arguments-and-options-command';

    protected $description = 'Tests arguments and options';

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

    public function getOptions()
    {
        return [
            new InputOption('a'),
            new InputOption('b'),
            new InputOption('c')
        ];
    }

    public function handle()
    {
        print $this->argument('a') . ', ' . $this->argument('b') . ', ' . $this->argument('c') . ' - ' . $this->option('a') . ', ' . $this->option('b') . ', ' . $this->option('c');
    }
}
