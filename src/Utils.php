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
     * @param bool $return
     * @return string|null
     */
    public static function cliOutput(string $content, bool $return = false): ?string
    {
        ob_start();

        echo "\033[0;36m";
        echo $content;
        echo "\033[0m";

        $value = ob_get_clean();

        if ($return) {
            return $value;
        }

        echo $value . PHP_EOL;

        return null;
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
            return;
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
