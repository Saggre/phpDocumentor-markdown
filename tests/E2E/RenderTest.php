<?php

namespace PhpDocumentorMarkdown\Test\E2E;

class RenderTest extends E2ETestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $file = dirname(__FILE__, 3) . '/src/Example';
        self::renderDocument($file);
    }

    public function testRenderSuccess(): void
    {
        self::assertTrue(self::outputFileExists('Home.md'));
        self::assertTrue(self::outputFileExists('classes/PhpDocumentorMarkdown/Example/Pizza.md'));
    }

    public function testRenderLineBreaks(): void
    {
        $content = self::readOutputFile('classes/PhpDocumentorMarkdown/Example/Pizza.md');

        self::assertEquals(
            -1,
            strpos($content, "\n\n\n\n"),
            'Rendered content must not have more than three line breaks'
        );
    }
}
