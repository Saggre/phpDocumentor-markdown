<?php

namespace PhpDocumentorMarkdown\Test\Twig\Macro;

class MacroTest extends MacroTestCase
{
    /**
     * Test mdEsc macro.
     *
     * @return void
     */
    public function testMdEsc()
    {
        $result = $this->getMacroData('mdEsc', 'a|b|c');
        self::assertMacroOutputEquals('a&#124;b&#124;c', $result->getOutput());
    }

    /**
     * Test mdGetRelativePath macro.
     *
     * @return void
     */
    public function testMdGetRelativePath()
    {
        $result = $this->getMacroData('mdGetRelativePath', ['a/b', 'a/b/c/d']);
        self::assertMacroOutputEquals('c/d', $result->getOutput());

        $result = $this->getMacroData('mdGetRelativePath', ['a/b/c/d', 'a']);
        self::assertMacroOutputEquals('../..', $result->getOutput());
    }

    /**
     * Test mdNodePath macro.
     *
     * @return void
     */
    public function testMdNodePath()
    {
        $name = '\Fully\Qualified\Structural\Element\Name';

        $result = $this->getMacroData('mdNodePath', $name);
        self::assertMacroOutputEquals('/Fully/Qualified/Structural/Element/Name.md', $result->getOutput());

        $input = (object)array(
            'FullyQualifiedStructuralElementName' => $name,
        );

        $result = $this->getMacroData('mdNodePath', $input);
        self::assertMacroOutputEquals('/Fully/Qualified/Structural/Element/Name.md', $result->getOutput());
    }

    /**
     * Test mdClassPath macro.
     *
     * @return void
     */
    public function testMdClassPath()
    {
        $name = '\Fully\Qualified\Structural\Element\Name';

        $result = $this->getMacroData('mdClassPath', $name);
        self::assertMacroOutputEquals('classes/Fully/Qualified/Structural/Element/Name.md', $result->getOutput());

        $input = (object)array(
            'FullyQualifiedStructuralElementName' => $name,
        );

        $result = $this->getMacroData('mdClassPath', $input);
        self::assertMacroOutputEquals('classes/Fully/Qualified/Structural/Element/Name.md', $result->getOutput());
    }

    /**
     * Test mdClassLink macro.
     *
     * @return void
     */
    public function testMdClassLink()
    {
        $name = '\Fully\Qualified\Structural\Element\Name';

        self::assertMacroOutputEquals(
            '[`Unknown`](./classes/Fully/Qualified/Structural/Element/Name.md)',
            $this->mdClassLink($name)->getOutput()
        );

        self::assertMacroOutputEquals(
            '[`ClassName`](Structural/Element/Name.md)',
            $this->mdClassLink($name, 'classes/Fully/Qualified', 'ClassName')->getOutput()
        );
    }
}
