<?php

namespace Conti\Plugins\Helper;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * TimeCommand
 */
class TimeCommand extends Command
{
    /**
     * configure
     */
    protected function configure()
    {
        $this->setName('helper:time');
        $this->setDescription('Display time information');
    }

    /*
     * execute
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Current Timestamp: %s', time()));
    }
}