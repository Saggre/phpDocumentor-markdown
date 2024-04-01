<?php

namespace PhpDocumentorMarkdown\Test\Integration;

class IntegrationTest extends IntegrationTestCase
{
    public function testTest()
    {
        $this->runApplication();

        $this->assertFileExists("{$this->targetDir}/Home.md");
        $this->assertFileContainsString(
            '[`AbstractProduct`]',
            "{$this->targetDir}/Home.md",
            'File contains class documentation'
        );
    }
}
