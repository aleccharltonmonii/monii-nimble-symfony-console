<?php

namespace Monii\Nimble\Symfony\Console;

use Illuminate\Container\Container;
use Monii\Nimble\Symfony\Console\Command\Command;

function containerize_command(Container $container, Command $command) {
    if ($command instanceof Command) {
        $command->setContainer($container);
    }
    return $command;
}
