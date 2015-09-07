<?php

namespace Monii\Nimble\Symfony\Console\Tests\ArrayConfigured;

use Monii\Nimble\Symfony\Console\Command\Command;
use function Monii\Nimble\Symfony\Console\containerize_command;

class WithoutArgumentsOrOptionsCommand extends Command
{
    protected $name = 'array-configured:without-arguments-or-options-command';

    protected $description = 'Tests no arguments or options';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        print '';
    }
}
