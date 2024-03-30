<?php

namespace PhpDocumentorMarkdown\Test\Integration;

use phpDocumentor\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
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
}
