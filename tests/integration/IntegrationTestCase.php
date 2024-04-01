<?php

namespace PhpDocumentorMarkdown\Test\Integration;

use phpDocumentor\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Exception\ExceptionInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Filesystem\Filesystem;

class IntegrationTestCase extends KernelTestCase
{
    protected Application $application;
    protected Filesystem $filesystem;
    /**
     * @var string The path to the temporary directory for tests.
     */
    protected string $tmpDir;
    /**
     * @var string The path to the cache directory for tests.
     */
    protected string $cacheDir;
    /**
     * @var string The path to the markdown template directory.
     */
    protected string $templateDir;
    /**
     * @var string The path to the test source files directory.
     */
    protected string $sourceDir;
    /**
     * @var string The path to the target directory for tests.
     */
    protected string $targetDir;

    protected array $cachedFiles;

    protected function setUp(): void
    {
        parent::setUp();

        $projectDir = dirname(__DIR__, 2);

        $this->tmpDir = "$projectDir/.tests";
        $this->cacheDir = "$this->tmpDir/cache";
        $this->targetDir = "$this->tmpDir/output";
        $this->templateDir = "$projectDir/themes/markdown";
        $this->sourceDir = "$projectDir/src/Example";

        $this->application = $this->createApplication();
        $this->filesystem = new Filesystem();

        $this->cachedFiles = [];

        $this->setUpTestsTmpDir();
    }

    protected function createApplication(): Application
    {
        return new Application($this->createKernel());
    }

    protected function setUpTestsTmpDir(): void
    {
        if ($this->filesystem->exists($this->tmpDir)) {
            $this->filesystem->remove($this->tmpDir);
        }

        $this->filesystem->mkdir($this->tmpDir);
    }

    /**
     * Assert that a file contains a string.
     *
     * @param string $needle
     * @param string $path
     * @param string $message
     * @return void
     */
    protected function assertFileContainsString(string $needle, string $path, string $message = ''): void
    {
        if (!$this->filesystem->exists($path)) {
            $this->fail("$path does not exist");
        }

        $haystack = file_get_contents($path);
        $this->assertStringContainsString($needle, $haystack, $message);
    }

    /**
     * Run PhpDocumentor.
     *
     * @param array $input
     * @param BufferedOutput|null $output
     * @return void
     */
    protected function runApplication(array $input = [], ?BufferedOutput $output = null): void
    {
        if ($output === null) {
            $output = new BufferedOutput();
        }

        $_input = new ArrayInput(array_merge($input, [
            '--directory' => [$this->sourceDir],
            '--target' => $this->targetDir,
            '--template' => $this->templateDir,
            '--no-interaction' => true,
            '--cache-folder' => $this->cacheDir,
            '-vvv' => true,
        ]));

        try {
            $command = $this->application->find('project:run');
            $command->run($_input, $output);
        } catch (ExceptionInterface $e) {
            $this->fail($e->getMessage());
        }
    }
}
