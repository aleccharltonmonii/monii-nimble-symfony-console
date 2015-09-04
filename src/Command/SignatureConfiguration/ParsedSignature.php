<?php

namespace Monii\Nimble\Symfony\Console\Command\SignatureConfiguration;

class ParsedSignature
{
    public $name;
    public $arguments;
    public $options;

    function __construct($name, $arguments, $options)
    {
        $this->name = $name;
        $this->arguments = $arguments;
        $this->options = $options;
    }

    function getName()
    {
        return $this->name;
    }

    function getArguments()
    {
        return $this->arguments;
    }

    function getOptions()
    {
        return $this->options;
    }
}
