<?php

namespace Task3;

class FileScrapper implements Scrapper
{
    /**
     * @inheritDoc
     */
    public function getBody(string $url): string
    {
        $html = file_get_contents($url);
        if ($html === false) {
            throw new \RuntimeException("Couldn't open file {$url}");
        }

        return $html;
    }
}
