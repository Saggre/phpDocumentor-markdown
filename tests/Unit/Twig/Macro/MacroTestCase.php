<?php

namespace PhpDocumentorMarkdown\Test\Unit\Twig\Macro;

use PhpDocumentorMarkdown\Test\Unit\Twig\UnitTestCase;
use Throwable;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

class MacroTestCase extends UnitTestCase
{
    protected TemplateWrapper $template;

    protected function setUp(): void
    {
        parent::setUp();

        try {
            $this->loadMacroTemplate();
        } catch (Throwable $e) {
            self::fail($e->getMessage());
        }
    }

    /**
     * Load the template.
     *
     * @return void
     * @throws RuntimeError
     * @throws LoaderError
     *
     * @throws SyntaxError
     */
    protected function loadMacroTemplate(): void
    {
        // Allow Twig to load files from both /tests and /themes
        $loader = new FilesystemLoader(ROOT_DIR);
        $twig = new Environment($loader);

        $this->template = $twig->load('tests/Unit/Twig/templates/macros.test.twig');
    }

    /**
     * @param string $key
     * @param array $args
     *
     * @return string Macro output
     */
    protected function renderTemplate(string $key, array $args): string
    {
        $variables = [
            'relativeIncludePath' => $this->getRelativeIncludePath(),
            'key' => $key,
            'args' => $args,
        ];

        return $this->template->render($variables);
    }
}
