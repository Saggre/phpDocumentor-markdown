<?php

namespace PhpDocumentorMarkdown\Test\Unit\Twig\Macro;

class MacroTest extends MacroTestCase
{
    public static function dataProviderTestMdEsc(): array
    {
        return [
            [
                'expected' => 'a\|b\|c',
                'args' => ['a|b|c'],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdEsc
     */
    public function testMdEsc(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdEsc', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdGetRelativePath(): array
    {
        return [
            [
                'expected' => 'baz/qux',
                'args' => ['foo/bar', 'foo/bar/baz/qux'],
            ],
            [
                'expected' => '../..',
                'args' => ['foo/bar/baz/qux', 'foo'],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdGetRelativePath
     */
    public function testMdGetRelativePath(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdGetRelativePath', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdNodePath(): array
    {
        return [
            [
                'expected' => 'Fully/Qualified/Structural/Element/Name.md',
                'args' => ['\Fully\Qualified\Structural\Element\Name'],
            ],
            [
                'expected' => 'Fully/Qualified/Structural/Element/Name.md',
                'args' => [(object)['FullyQualifiedStructuralElementName' => '\Fully\Qualified\Structural\Element\Name']],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdNodePath
     */
    public function testMdNodePath(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdNodePath', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdClassPath(): array
    {
        return [
            [
                'expected' => 'classes/Fully/Qualified/Structural/Element/Name.md',
                'args' => ['\Fully\Qualified\Structural\Element\Name'],
            ],
            [
                'expected' => 'classes/Fully/Qualified/Structural/Element/Name.md',
                'args' => [(object)['FullyQualifiedStructuralElementName' => '\Fully\Qualified\Structural\Element\Name']],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdClassPath
     */
    public function testMdClassPath(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdClassPath', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdFunctionPath(): array
    {
        return [
            [
                'expected' => 'functions/Fully/Qualified/Structural/Element/Name.md',
                'args' => ['\Fully\Qualified\Structural\Element\Name'],
            ],
            [
                'expected' => 'functions/Fully/Qualified/Structural/Element/Name.md',
                'args' => [(object)['FullyQualifiedStructuralElementName' => '\Fully\Qualified\Structural\Element\Name']],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdFunctionPath
     */
    public function testMdFunctionPath(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdFunctionPath', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdLink(): array
    {
        return [
            [
                'expected' => '[`Unknown`](./classes/Fully/Qualified/Structural/Element/Name.md)',
                'args' => ['\Fully\Qualified\Structural\Element\Name', null, null, 'class'],
            ],
            [
                'expected' => '[`ClassName`](Structural/Element/Name.md)',
                'args' => ['\Fully\Qualified\Structural\Element\Name', 'classes/Fully/Qualified', 'ClassName', 'class'],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdLink
     */
    public function testMdLink(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdLink', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdRepeat(): array
    {
        return [
            ['expected' => '', 'args' => ['x', 0]],
            ['expected' => '', 'args' => ['x', -5]],
            ['expected' => 'x', 'args' => ['x', 1]],
            ['expected' => 'xxxxx', 'args' => ['x', 5]],
            ['expected' => '---', 'args' => ['-', 3]],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdRepeat
     */
    public function testMdRepeat(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdRepeat', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdPadRight(): array
    {
        return [
            ['expected' => 'foo     ', 'args' => ['foo', 8]],
            ['expected' => 'foobar', 'args' => ['foobar', 6]],
            ['expected' => 'foobar', 'args' => ['foobar', 4]],
            ['expected' => '        ', 'args' => ['', 8]],
            ['expected' => 'a', 'args' => ['a', 1]],
            ['expected' => 'a ', 'args' => ['a', 2]],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdPadRight
     */
    public function testMdPadRight(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdPadRight', $args);
        self::assertEquals($expected, $result);
    }

    public static function dataProviderTestMdTable(): array
    {
        return [
            [
                'expected' => <<<MD
| Class     | Description           |
|-----------|-----------------------|
| MyClass   | This is a test class. |
| YourClass | Another description.  |
MD,
                'args' => [
                    // rows
                    [
                        ['name' => 'MyClass', 'summary' => 'This is a test class.'],
                        ['name' => 'YourClass', 'summary' => 'Another description.'],
                    ],
                    // headers
                    [
                        ['label' => 'Class', 'key' => 'name'],
                        ['label' => 'Description', 'key' => 'summary'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestMdTable
     */
    public function testMdTable(string $expected, array $args): void
    {
        $result = $this->renderTemplate('mdTable', $args);
        self::assertEquals(trim($expected), trim($result));
    }
}
