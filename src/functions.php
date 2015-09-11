<?php

namespace Monii\Nimble\Symfony\Console;

use Illuminate\Container\Container;
use Monii\Nimble\Symfony\Console\Command\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

/**
 * @param Container $container
 * @param SymfonyCommand $command
 * @return Command|SymfonyCommand
 */
function containerize_command(Container $container, SymfonyCommand $command) {
    if ($command instanceof Command) {
        $command->setContainer($container);
    }
    return $command;
}
