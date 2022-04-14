<?php

namespace PhpDocumentorMarkdown\Example;

/**
 * A trait for reviewable objects.
 */
trait ReviewableTrait
{
    /**
     * Whether the object has been reviewed.
     *
     * @return bool
     */
    public function isReviewed(): bool
    {
        return true;
    }
}
