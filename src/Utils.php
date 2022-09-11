<?php

namespace PhpDocumentorMarkdown;

class Utils
{
    /**
     * Get template path.
     *
     * @return string
     */
    public static function getTemplatePath(): string
    {
        return dirname(__FILE__, 2) . '/themes/markdown';
    }

    /**
     * Print to CLI with color.
     *
     * @param string $content
     * @return void
     */
    public static function cliOutput(string $content): void
    {
        echo "\033[0;36m";
        echo $content;
        echo "\033[0m";
        echo PHP_EOL;
    }
}
