<?php

namespace Monii\Nimble\Symfony\Console\Tests\ArrayConfigured;

use Monii\Nimble\Symfony\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use function Monii\Nimble\Symfony\Console\containerize_command;

class WithOptionsCommand extends Command
{
    protected $name = 'array-configured:with-options-command';

    protected $description = 'Tests options';

    public function __construct()
    {
        parent::__construct();
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
        print $this->option('a') . ', ' . $this->option('b') . ', ' . $this->option('c');
    }
}
