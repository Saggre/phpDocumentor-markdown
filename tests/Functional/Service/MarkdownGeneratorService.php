<?php

namespace PhpDocumentorMarkdown\Test\Functional\Service;

use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class MarkdownGeneratorService
{
    protected string $workingDir;
    protected Filesystem $filesystem;

    public function __construct(
        protected string $projectRootPath
    ) {
        $this->filesystem = new Filesystem();
        $this->workingDir = tempnam(sys_get_temp_dir(), 'phpdoc');
        $this->filesystem->remove($this->workingDir);

        if (!mkdir($concurrentDirectory = $this->workingDir) && !is_dir($concurrentDirectory)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
    }

    public function cleanup(): void
    {
        $this->filesystem->remove($this->workingDir);
    }

    protected function getProjectRootPath(): string
    {
        return $this->projectRootPath;
    }

    protected function getThemePath(): string
    {
        return "{$this->getProjectRootPath()}/themes/markdown";
    }

    protected function getPhpDocBinaryPath(): string
    {
        return "{$this->getProjectRootPath()}/vendor/bin/phpdoc";
    }

    public function runPhpDocWithDir(string $path, array $arguments = []): Process
    {
        if (!is_dir($path)) {
            throw new InvalidArgumentException(sprintf('The path "%s" is not a directory.', $path));
        }

        $this->filesystem->mirror($path, "$this->workingDir/test");

        $process = new Process(
            array_merge(
                [
                    PHP_BINARY,
                    $this->getPhpDocBinaryPath(),
                    '-vvv',
                    '--config=none',
                    '--force',
                    "--template={$this->getThemePath()}",
                    "--directory=$this->workingDir/test",
                    "--target=$this->workingDir/output",
                    '--title=Pizza Place (Example documentation)'
                ],
                $arguments
            ),
            $this->workingDir
        );

        return $process->mustRun();
    }

    public function loadContents($filename): string
    {
        return file_get_contents($this->workingDir . '/output/' . $filename);
    }
}
