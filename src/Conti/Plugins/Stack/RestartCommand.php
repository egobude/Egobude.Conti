<?php

namespace Conti\Plugins\Stack;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * RestartCommand
 */
class RestartCommand extends Command
{
    /**
     * configure
     */
    protected function configure()
    {
        $this->setName('stack:restart');
        $this->setDescription('Restart services');
    }

    /*
     * execute
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $process = new Process('docker-compose -f example/docker-compose.yml restart');
        $process->start();

        foreach ($process as $type => $data) {
            if ($process::OUT === $type) {
                $output->write($data);
            } else { // $process::ERR === $type
                $output->write($data);
            }
        }

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}