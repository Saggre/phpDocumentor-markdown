<?php

use PhpDocumentorMarkdown\Test\Twig\TestCase;
use PhpDocumentorMarkdown\Utils;

class RenderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        self::assertPhpdocVersion();
    }

    /**
     * Make sure a valid PHPDocumentor binary is available in shell.
     *
     * @return void
     */
    protected static function assertPhpdocVersion(): void
    {
        $version = self::getPhpdocVersion();

        if (empty($version)) {
            self::markTestSkipped('No PHPDocumentor binary for keyword phpdoc');
        }

        if ($version[0] !== '3') {
            $versionString = implode('.', $version);
            self::markTestSkipped("PHPDocumentor binary detected as version $versionString, must be at 3.x.x");
        }
    }

    /**
     * Get PHPDocumentor version or null if no valid version found.
     *
     * @return array|null
     */
    protected static function getPhpdocVersion(): ?array
    {
        $version = shell_exec('phpdoc -V');

        if (empty($version)) {
            return null;
        }

        preg_match_all('(\d+)', $version, $matches);

        return $matches[0] ?? null;
    }

    protected static function renderDocument()
    {
        $path = __FILE__;

        $outputDir = __DIR__ . '/output';
        $templatePath = Utils::getTemplatePath();

        $result = shell_exec("rm -rf $outputDir");

        $command = "phpdoc -f $path -t $outputDir --template $templatePath --cache-folder /tmp";
        $result = shell_exec($command);

        $a = 10;
    }

    public function testRender(): void
    {
        self::renderDocument();
        self::assertEquals(1, 1);
    }
}
