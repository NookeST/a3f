<?php

namespace Task3;

class Parser
{
    private Scrapper $scrapper;
    private Crawler $crawler;

    public function __construct(Scrapper $scrapper, Crawler $crawler)
    {
        $this->scrapper = $scrapper;
        $this->crawler = $crawler;
    }

    public function getTagsMap(string $url): array
    {
        $html = $this->scrapper->getBody($url);
        $this->crawler->addHtmlContent($html);

        return $this->crawler->getTagsMap($html);
    }
}
