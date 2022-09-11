<?php

namespace PhpDocumentorMarkdown\Command;

use PhpDocumentorMarkdown\PhpdocBinaryHandler;
use PhpDocumentorMarkdown\Utils;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DocumentorCommand extends Command
{
    protected static $defaultName = 'run';

    protected function configure()
    {
        $this->setDescription('Create documentation');
        $this->addOption('directory', 'd', InputOption::VALUE_REQUIRED, 'Input directory');
        $this->addOption('target', 't', InputOption::VALUE_REQUIRED, 'Output directory');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $directory = $input->getOption('directory');
        $target = $input->getOption('target');

        try {
            PhpdocBinaryHandler::call("-d $directory -t $target --template xml --cache-folder /tmp");
            echo PHP_EOL;
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }

        $output->writeln(Utils::cliOutput('Generated template', true));

        return Command::SUCCESS;
    }
}