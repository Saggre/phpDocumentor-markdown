<?php

namespace PhpDocumentorMarkdown\Test\Twig\Macro;

/**
 * A PHP wrapper for Twig macros. Used for testing.
 */
trait MacroFunctionsTrait
{
    /**
     * Get the macro data from the template.
     *
     * @param  string  $macro  Macro name to run.
     * @param  mixed  $input  Input to give the macro.
     *
     * @return MacroData|null
     */
    abstract protected function getMacroData(string $macro, $input): ?MacroData;

    /**
     * Create a relative md link to a class.
     *
     * @param  object|string  $nodeOrNamespace  The node to get the link for or a PHP class namespace string.
     * @param  string|null  $relativeTo  The path to make relative to (usually path of the md file that this is being printed to).
     * @param  string|null  $name  Link text.
     *
     * @return MacroData|null
     */
    public function mdClassLink($nodeOrNamespace, string $relativeTo = null, string $name = null): ?MacroData
    {
        return $this->getMacroData('mdClassLink', [$nodeOrNamespace, $relativeTo, $name]);
    }
}
