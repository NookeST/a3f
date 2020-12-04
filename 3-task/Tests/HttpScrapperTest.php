<?php

namespace Task3\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Task3\HttpScrapper;

class HttpScrapperTest extends TestCase
{
    private HttpScrapper $scrapper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->scrapper = new HttpScrapper(new Client());
    }

    /**
     * @test
     * @large
     * @dataProvider getUrlsTests
     */
    public function getBody(string $url, string $file)
    {
        $expected = file_get_contents($file);
        $this->assertEquals($expected, $this->scrapper->getBody($url));
    }

    public function getUrlsTests()
    {
        return [
            ['https://docs.guzzlephp.org/en/stable/index.html?highlight=charset', './3-task/Tests/Fixtures/yandex.html'],
        ];
    }
}
