<?php

namespace PhpDocumentorMarkdown\Example\Pizza;

/**
 * Pizza sauce class.
 */
class Sauce
{
    /**
     * Sauce name.
     *
     * @var string
     */
    protected string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
