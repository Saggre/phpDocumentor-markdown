<?php

namespace PhpDocumentorMarkdown\Example;

use JsonSerializable;

/**
 * A ManyInterfaces
 *
 * ManyInterfaces description {@see AbstractProduct}
 */
interface ManyInterfaces extends ProductInterface, JsonSerializable
{
    // ...
}
