<?php

namespace PhpDocumentorMarkdown\Test\Functional;

class PhpdocOutputTest extends FunctionalTestCase
{
    public static function dataProviderTestFiles(): iterable
    {
        return array(
            array(
                'path' => 'Home.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/AbstractProduct.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/Arrayable.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/Pizza.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/ProductInterface.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/ReviewableTrait.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/ManyInterfaces.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/Pizza/Base.md',
            ),
            array(
                'path' => 'classes/PhpDocumentorMarkdown/Example/Pizza/Sauce.md',
            ),
            array(
                'path' => 'functions/getDatabaseConfig.md',
            ),
            array(
                'path' => 'functions/mockFunctionWithParameters.md',
            ),
        );
    }

    /**
     * @dataProvider dataProviderTestFiles
     */
    public function testFiles(string $path)
    {
        self::assertMarkdownFileEquals(
            __DIR__ . "/expected/$path",
            $path,
            "Markdown at $path does not match expected output"
        );
    }
}
