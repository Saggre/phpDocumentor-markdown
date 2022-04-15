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
}
