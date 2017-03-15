<?php

namespace Conti\Plugins\Stack;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * ExecCommand
 */
class ExecCommand extends Command
{
    /**
     * configure
     */
    protected function configure()
    {
        $this->setName('stack:exec');
        $this->setDescription('Execute a command in a running container');
        $this->addArgument('container', InputArgument::REQUIRED);
        $this->addArgument('shell', InputArgument::OPTIONAL, '', 'sh');
    }

    /*
     * execute
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cmd = 'docker-compose -f example/docker-compose.yml exec ' . $input->getArgument('container') . ' ' . $input->getArgument('shell');
        $process = new Process($cmd);
        try {
            $process->setTty(true);
            $process->mustRun(function ($type, $buffer) {
                echo $buffer;
            });
        } catch (ProcessFailedException $e) {
            echo $e->getMessage();
        }
    }
}