<?php

namespace Monii\Nimble\Symfony\Console\Command;

trait CommandOutput
{
    /**
     * The output interface implementation.
     *
     * @var OutputStyle
     */
    protected $output;

    public function setOutput($output)
    {
        $this->output = $output;
    }

    /**
     * Get the output implementation.
     *
     * @return \Symfony\Component\Console\Output\OutputInterface
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Write a string as information output.
     *
     * @param  string  $string
     * @return void
     */
    public function info($string)
    {
        $this->output->writeln("<info>$string</info>");
    }
}
