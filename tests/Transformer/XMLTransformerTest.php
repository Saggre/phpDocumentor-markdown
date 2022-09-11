<?php

namespace PhpDocumentorMarkdown\Test\Transformer;

use PhpDocumentorMarkdown\XMLTransformer;
use PHPUnit\Framework\TestCase;

class XMLTransformerTest extends TestCase
{
    protected static XMLTransformer $transformer;

    public static function setUpBeforeClass(): void
    {
        self::$transformer = new XMLTransformer(__DIR__ . '/mock/structure.xml');
    }

    public function testTransformer()
    {
        self::$transformer->parse();
    }
}
