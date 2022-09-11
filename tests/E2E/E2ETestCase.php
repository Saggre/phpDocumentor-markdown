<?php

namespace PhpDocumentorMarkdown\Test\E2E;

use PhpDocumentorMarkdown\PhpdocBinaryHandler;
use PhpDocumentorMarkdown\Test\Twig\TestCase;
use PhpDocumentorMarkdown\Utils;

class E2ETestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        try {
            PhpdocBinaryHandler::assertBinaryVersion();
        } catch (\Exception $e) {
            self::markTestSkipped('No PHPDocumentor binary found');
        }

        self::clearOutputDir();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        self::clearOutputDir();
    }

    /**
     * Get output path for rendered markdown.
     *
     * @return string
     */
    protected static function getDocumentOutputPath(): string
    {
        return __DIR__ . '/output';
    }

    /**
     * Render a document to output dir.
     *
     * @param string $inputPath
     * @return void
     */
    protected static function renderDocument(string $inputPath): void
    {
        $outputDir = self::getDocumentOutputPath();
        $templatePath = Utils::getTemplatePath();
        PhpdocBinaryHandler::call("-d $inputPath -t $outputDir --template $templatePath --cache-folder /tmp");
    }

    /**
     * Clear the output directory.
     *
     * @return void
     */
    protected static function clearOutputDir(): void
    {
        $path = self::getDocumentOutputPath();
        Utils::deleteDir($path);
    }

    /**
     * Read an output file into a variable.
     *
     * @param string $relativePath
     * @return string
     */
    protected static function readOutputFile(string $relativePath): string
    {
        $outputDir = self::getDocumentOutputPath();

        return file_get_contents("$outputDir/$relativePath");
    }

    /**
     * Whether an output file exists.
     *
     * @param string $relativePath
     * @return bool
     */
    protected static function outputFileExists(string $relativePath): bool
    {
        $outputDir = self::getDocumentOutputPath();

        return file_exists("$outputDir/$relativePath");
    }
}
