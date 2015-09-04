<?php

namespace Monii\Nimble\Symfony\Console\Command\ArrayConfiguration;

trait ArrayConfiguration
{
    function configureFromArrays($definition, $arguments, $options)
    {
        foreach ($arguments as $argument) {
            $definition->addArgument($argument);
        }

        foreach ($options as $option) {
            $definition->addOption($option);
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
