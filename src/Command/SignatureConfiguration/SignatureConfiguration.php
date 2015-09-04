<?php

namespace Monii\Nimble\Symfony\Console\Command\SignatureConfiguration;

trait SignatureConfiguration {

    function parseSignature($signature)
    {
        $parsedSignature = SignatureParser::parse($signature);

        return $parsedSignature;
    }

    function configureFromSignature($definition, $parsedSignature)
    {
        foreach ($parsedSignature->getArguments() as $argument) {
            $definition->addArgument($argument);
        }

        foreach ($parsedSignature->getOptions() as $option) {
            $definition->addOption($option);
        }

    }
}
