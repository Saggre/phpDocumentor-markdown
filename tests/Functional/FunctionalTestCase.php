<?php

namespace PhpDocumentorMarkdown\Test\Functional;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Exception\CommonMarkException;
use PhpDocumentorMarkdown\Test\Functional\Service\MarkdownGeneratorService;
use PHPUnit\Framework\TestCase;

class FunctionalTestCase extends TestCase
{
    protected static MarkdownGeneratorService $markdownGenerator;

    public static function getProjectRootPath(): string
    {
        return dirname(__DIR__, 2);
    }

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        self::$markdownGenerator = new MarkdownGeneratorService(self::getProjectRootPath());
        self::$markdownGenerator->runPhpDocWithDir(self::getProjectRootPath() . '/src/Example');
    }

    public function getMarkdownGenerator(): MarkdownGeneratorService
    {
        return self::$markdownGenerator;
    }

    final public static function assertMarkdownFileEquals(string $expectedPath, string $actualPath, $message = ''): void
    {
        $expected = file_get_contents($expectedPath);
        $actual = self::$markdownGenerator->loadContents($actualPath);
        self::assertMarkdownEquals($expected, $actual, $message);
    }

    final public static function assertMarkdownEquals(string $expected, string $actual, $message = ''): void
    {
        self::assertEquals(
            $expected,
            $actual,
            $message ?: 'Markdown does not match expected output.'
        );
    }

    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
        self::$markdownGenerator->cleanup();
    }
}
