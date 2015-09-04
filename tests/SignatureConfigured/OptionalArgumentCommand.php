<?php

namespace Monii\Nimble\Symfony\Console\Tests\SignatureConfigured;

use Monii\Nimble\Symfony\Console\Command\Command;
use function Monii\Nimble\Symfony\Console\containerize_command;

class OptionalArgumentCommand extends Command
{
    protected $signature = 'signature-configured:optional-argument-command {argument?}';

    protected $description = 'Tests optional arguments';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        print $this->argument('argument');
    }
}
