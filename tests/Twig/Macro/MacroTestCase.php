<?php

namespace PhpDocumentorMarkdown\Test\Twig\Macro;

use PhpDocumentorMarkdown\Extension\JsonExtension;
use PhpDocumentorMarkdown\Extension\MacroDataExtension;
use PhpDocumentorMarkdown\Extension\ObjectExtension;
use PhpDocumentorMarkdown\Test\Twig\TestCase;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

class MacroTestCase extends TestCase
{
    use MacroFunctionsTrait;

    private TemplateWrapper $template;

    protected function setUp(): void
    {
        parent::setUp();

        try {
            $this->loadTemplate();
        } catch (\Throwable $e) {
            self::fail($e->getMessage());
        }
    }

    /**
     * Load the template.
     *
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    protected function loadTemplate()
    {
        // Allow Twig to load files from both /tests and /themes
        $loader = new FilesystemLoader(ROOT_DIR);
        $twig   = new Environment($loader);
        $twig->addExtension(new JsonExtension());
        $twig->addExtension(new ObjectExtension());
        $twig->addExtension(new MacroDataExtension());

        $this->template = $twig->load('tests/Twig/templates/macros.test.twig');
    }

    /**
     * Assert macro output.
     *
     * @param $expected
     * @param $actual
     *
     * @return void
     */
    protected static function assertMacroOutputEquals($expected, $actual)
    {
        if (is_string($expected) && is_string($actual)) {
            $message = "The macro output does not match the expected output. Expected: $expected, Actual: $actual";
        } else {
            $message = "The macro output does not match the expected output.";
        }

        self::assertEquals(
            $expected,
            $actual,
            $message
        );
    }

    /**
     * Get the macro data from the template.
     *
     * @param  string  $macro  Macro name to run.
     * @param  mixed  $input  Input to give the macro.
     *
     * @return MacroData|null
     */
    protected function getMacroData(string $macro, $input): ?MacroData
    {
        $variables = [
            'relativeIncludePath' => $this->getRelativeIncludePath(),
            'tests'               => [
                new MacroData($macro, $input),
            ],
        ];

        $results = $this->template->render($variables);
        $results = trim($results);
        $results = json_decode($results);

        if ($results === null) {
            throw new \RuntimeException("Failed to decode JSON for macro $macro");
        }

        $results = array_map(
            [MacroData::class, 'fromJson'],
            $results
        );

        return reset($results) ?: null;
    }
}
