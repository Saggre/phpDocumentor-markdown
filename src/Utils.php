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
}
