<?php

namespace PhpDocumentorMarkdown\Test\Unit\Twig;

use PHPUnit\Framework\TestCase;

class TwigTestCase extends TestCase
{
    /**
     * @var string The path to test templates.
     */
    private string $testTemplatePath;

    /**
     * @var string The relative path to production template include dir.
     */
    private string $relativeIncludePath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->testTemplatePath = __DIR__ . '/templates';
        $this->relativeIncludePath = 'themes/markdown/include';
    }

    /**
     * Get the path to test templates.
     *
     * @return string
     */
    public function getTestTemplatePath(): string
    {
        return $this->testTemplatePath;
    }

    /**
     * Get the relative path to production template include dir.
     *
     * @return string
     */
    public function getRelativeIncludePath(): string
    {
        return $this->relativeIncludePath;
    }
}
