<?php

namespace PhpDocumentorMarkdown\Test\Integration;

use phpDocumentor\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class IntegrationTest extends IntegrationTestCase
{
    public function testTest()
    {
        $input = new ArrayInput([
            '--directory' => [$this->sourceDir],
            '--target' => $this->targetDir,
            '--template' => $this->templateDir,
            '--no-interaction' => true,
            '--cache-folder' => $this->cacheDir,
            '-vvv' => true,
        ]);

        $output = new BufferedOutput();

        $this->application->run($input, $output);

        echo $output->fetch();
    }
}
