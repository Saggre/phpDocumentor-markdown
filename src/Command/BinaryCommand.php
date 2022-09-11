<?php

namespace PhpDocumentorMarkdown\Command;

use PhpDocumentorMarkdown\PhpdocBinaryHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BinaryCommand extends Command
{
    protected static $defaultName = 'binary:phpdoc';

    protected function configure()
    {
        $this->setDescription('Download PHPDocumentor binary');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            PhpdocBinaryHandler::downloadBinaryIfNotExists();
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}