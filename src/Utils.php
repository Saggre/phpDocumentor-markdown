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

    /**
     * Delete a directory and all its contents.
     *
     * @param $path
     * @return void
     */
    public static function deleteDir($path): void
    {
        if (!is_dir($path)) {
            throw new \InvalidArgumentException("$path must be a directory");
        }

        if (substr($path, strlen($path) - 1, 1) != '/') {
            $path .= '/';
        }

        $files = glob($path . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }

        rmdir($path);
    }
}
