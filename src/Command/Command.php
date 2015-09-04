<?php

namespace Monii\Nimble\Symfony\Console\Command;

use Illuminate\Container\Container;
use Monii\Nimble\Symfony\Console\Command\ArrayConfiguration\ArrayConfiguration;
use Monii\Nimble\Symfony\Console\Command\SignatureConfiguration\SignatureConfiguration;
use Monii\Nimble\Symfony\Console\OutputStyle;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{
    use SignatureConfiguration;

    use ArrayConfiguration;

    use CommandInput;

    use CommandOutput;

    /**
     * The container application instance.
     *
     * @var Application
     */
    protected $container;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description;

    /**
     * Create a new console command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $parsedSignature = false;

        if ($this->signature != '' && $parsedSignature = $this->parseSignature($this->signature)) {
            parent::__construct($parsedSignature->getName());
            $this->configureFromSignature($this->getDefinition(), $parsedSignature);
        } else {
            parent::__construct($this->name);
        }

        $this->setDescription($this->description);

        if (! $parsedSignature) {
            $this->configureFromArrays(
                $this->getDefinition(),
                $this->getArguments(),
                $this->getOptions()
            );
        }
    }

    /**
     * Specify the arguments and options on the command.
     *
     * @return void
     */
    protected function specifyParameters()
    {
        // We will loop through all of the arguments and options for the command and
        // set them all on the base command instance. This specifies what can get
        // passed into these commands as "parameters" to control the execution.
        foreach ($this->getArguments() as $arguments) {
            call_user_func_array([$this, 'addArgument'], $arguments);
        }

        foreach ($this->getOptions() as $options) {
            call_user_func_array([$this, 'addOption'], $options);
        }
    }

    /**
     * Run the console command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return int
     */
    public function run(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;

        $this->output = new OutputStyle($input, $output);

        return parent::run($input, $output);
    }

    /**
     * Execute the console command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return mixed
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $method = method_exists($this, 'handle') ? 'handle' : 'fire';

        return $this->container->call([$this, $method]);
    }

    /**
     * Call another console command.
     *
     * @param  string  $command
     * @param  array   $arguments
     * @return int
     */
    public function call($command, array $arguments = [])
    {
        $instance = $this->getApplication()->find($command);

        $arguments['command'] = $command;

        return $instance->run(new ArrayInput($arguments), $this->output);
    }

    /**
     * Call another console command silently.
     *
     * @param  string  $command
     * @param  array   $arguments
     * @return int
     */
    public function callSilent($command, array $arguments = [])
    {
        $instance = $this->getApplication()->find($command);

        $arguments['command'] = $command;

        return $instance->run(new ArrayInput($arguments), new NullOutput());
    }

    /**
     * Get the container application instance.
     *
     * @return Application
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set the container application instance.
     *
     * @param  Application $container
     * @return void
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}
