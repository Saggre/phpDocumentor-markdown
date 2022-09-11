<?php

namespace PhpDocumentorMarkdown\Test\E2E;

class RenderTest extends E2ETestCase
{
    public function testRenderSuccess(): void
    {
        $file = dirname(__FILE__, 3) . '/src/Example';

        self::renderDocument($file);

        self::assertTrue(self::outputFileExists('Home.md'));
        self::assertTrue(self::outputFileExists('classes/PhpDocumentorMarkdown/Example/Pizza.md'));
    }
}
