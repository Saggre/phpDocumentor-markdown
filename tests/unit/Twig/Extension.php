<?php

namespace PhpDocumentorMarkdown\Test\Unit\Twig;

use PHPUnit\Runner\BeforeFirstTestHook;

class Extension implements BeforeFirstTestHook
{
    public function executeBeforeFirstTest(): void
    {
        define('ROOT_DIR', dirname(__DIR__, 3));
    }
}
