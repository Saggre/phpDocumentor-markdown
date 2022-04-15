<?php

namespace PhpDocumentorMarkdown\Test\Twig;

use PhpDocumentorMarkdown\Extension\JsonExtension;
use PhpDocumentorMarkdown\Extension\MacroDataExtension;
use PhpDocumentorMarkdown\Extension\ObjectExtension;
use PhpDocumentorMarkdown\Test\Twig\Macro\MacroData;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class ExampleTest extends TestCase
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function testExample()
    {
        // Allow Twig to load files from both /tests and /themes
        $loader = new FilesystemLoader(ROOT_DIR);
        $twig   = new Environment($loader);
        $twig->addExtension(new JsonExtension());
        $twig->addExtension(new ObjectExtension());
        $twig->addExtension(new MacroDataExtension());

        $template = $twig->load('tests/Twig/templates/macros.test.twig');

        $variables = [
            'relativeIncludePath' => $this->getRelativeIncludePath(),
            'tests'               => [
                new MacroData('mdEsc', 'a|b|c', 'a&#124;b&#124;c'),
            ],
        ];

        $results = $template->render($variables);
        $results = trim($results);
        $results = json_decode($results);

        $results = array_map(
            [MacroData::class, 'fromJson'],
            $results
        );

        foreach ($results as $result) {
            /** @type MacroData $result */
            $this->assertTrue(
                $result->isValidOutput(),
                "Output for {$result->getKey()} is invalid. Expected: {$result->getExpected()}, got: {$result->getOutput()}"
            );
        }
    }
}
