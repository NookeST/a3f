<?php

namespace Task3;


interface Scrapper
{
    /**
     * @param string $url
     * @return string
     * @throws \RuntimeException
     * @todo Change to Domain Exceptions.
     */
    public function getBody(string $url): string;
}
