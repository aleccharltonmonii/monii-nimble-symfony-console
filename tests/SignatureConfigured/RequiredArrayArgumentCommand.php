<?php

namespace Monii\Nimble\Symfony\Console\Tests\SignatureConfigured;

use Monii\Nimble\Symfony\Console\Command\Command;
use function Monii\Nimble\Symfony\Console\containerize_command;

class RequiredArrayArgumentCommand extends Command
{
    protected $signature = 'signature-configured:required-array-argument-command {argument*}';

    protected $description = 'Tests required array arguments';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (!empty($this->argument('argument'))) {
            print implode(', ', $this->argument('argument'));
        }else{
            print "";
        }
    }
}
