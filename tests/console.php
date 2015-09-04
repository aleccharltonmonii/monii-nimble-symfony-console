<?php

namespace Monii\Nimble\Symfony\Console\Tests;

use Monii\Nimble\Symfony\Console\Command\Command;
use Symfony\Component\Console\Application;
use function Monii\Nimble\Symfony\Console\containerize_command;

require __DIR__ . '/../vendor/autoload.php';

$container = new \Illuminate\Container\Container();

$application = new Application();
$application->add(containerize_command($container, new SignatureConfigured\OptionalArrayArgumentCommand()));
$application->add(containerize_command($container, new SignatureConfigured\RequiredArrayArgumentCommand()));
$application->add(containerize_command($container, new SignatureConfigured\OptionalArgumentCommand()));
$application->add(containerize_command($container, new ArrayConfigured\WithArgumentsCommand()));
$application->add(containerize_command($container, new ArrayConfigured\WithOptionsCommand()));
$application->add(containerize_command($container, new ArrayConfigured\WithBothArgumentsAndOptionsCommand()));
$application->add(containerize_command($container, new ArrayConfigured\WithoutArgumentsOrOptionsCommand()));
$application->run();
