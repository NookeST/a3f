<?php

namespace Task3\Tests;

use PHPUnit\Framework\TestCase;
use Task3\Crawler;
use Task3\FileScrapper;
use Task3\Parser;

class ParserTest extends TestCase
{
    private Parser $parser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->parser = new Parser(new FileScrapper(), new Crawler());
    }

    /**
     * @test
     * @dataProvider getFilesTestCases
     */
    public function getTagsMapFromFiles(string $file, array $expected)
    {
        $this->assertEquals($expected, $this->parser->getTagsMap($file));
    }

    public function getFilesTestCases()
    {
        return [
            [
                './3-task/Tests/Fixtures/list.html',
                ['html' => 1, 'body' => 1, 'ul' => 1, 'li' => 3]
            ],
            [
                './3-task/Tests/Fixtures/html5.html',
                ['html' => 1, 'body' => 1, 'head' => 1, 'meta' => 3, 'h1' => 1, 'title' => 1]
            ],
            [
                './3-task/Tests/Fixtures/svg.html',
                ['html' => 1, 'body' => 1, 'head' => 1, 'meta' => 3, 'svg' => 1, 'path' => 1, 'title' => 1]
            ],
        ];
    }
}
