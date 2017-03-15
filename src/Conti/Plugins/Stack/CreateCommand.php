<?php

namespace Conti\Plugins\Stack;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * CreateCommand
 */
class CreateCommand extends Command
{
    /**
     * configure
     */
    protected function configure()
    {
        $this->setName('stack:create');
        $this->setDescription('Creates your docker development environment');
        $this->addArgument('domain', InputArgument::REQUIRED);
    }

    /*
     * execute
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filesystem = new Filesystem();
        $resourcePath = getcwd() . '/res/';
        $examplePath = getcwd() . '/example/';

        try {
            $composeFile = file_get_contents($resourcePath . 'docker-compose.yml');
            $composeFile = str_replace('###IMAGE_NGINX###', 'zeroboh/nginx:1.11-alpine', $composeFile);
            $composeFile = str_replace('###IMAGE_PHP###', 'zeroboh/php:7.1-fpm-alpine', $composeFile);
            $composeFile = str_replace('###IMAGE_COMPOSER###', 'composer/composer:1-php5-alpine', $composeFile);
            $composeFile = str_replace('###IMAGE_MAILCATCHER###', 'zeroboh/mailcatcher:0.6-alpine', $composeFile);
            $composeFile = str_replace('###IMAGE_MARIADB###', 'zeroboh/mariadb:10.1-debian-jessie', $composeFile);
            $composeFile = str_replace('###IMAGE_NODEJS###', 'zeroboh/nodejs', $composeFile);

            $envFile = file_get_contents($resourcePath . '.env');
            $envFile = str_replace('###VIRTUAL_HOST###', $input->getArgument('domain'), $envFile);

            $filesystem->dumpFile($examplePath . '.env', $envFile);
            $filesystem->dumpFile($examplePath . 'docker-compose.yml', $composeFile);

            $output->writeln(sprintf('<info>Created new docker development stack fork %s</info>', $input->getArgument('domain')));

        } catch (IOExceptionInterface $e) {
            $output->writeln(sprintf('<error>An error occurred while creating your directory at %s</error>', $e->getPath()));
        }
    }
}