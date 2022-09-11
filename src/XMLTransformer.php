<?php

namespace PhpDocumentorMarkdown;

use Laravie\Parser\Xml\Document;
use Laravie\Parser\Xml\Reader;

/**
 * Transform XML into Markdown.
 */
class XMLTransformer
{
    protected Document $xml;

    public function __construct(string $path)
    {
        $document = new Document();
        $reader = new Reader($document);
        $this->xml = $reader->load($path);
    }

    public function parse()
    {
        $file = $this->xml->parse([
            'docblock' => ['uses' => 'file.docblock'],
            'namespace' => ['uses' => 'file.namespace-alias::name'],
            'class' => ['uses' => 'file.class'],
        ]);
    }
}
