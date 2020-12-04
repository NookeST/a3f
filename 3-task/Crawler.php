<?php

namespace Task3;

use Masterminds\HTML5;

class Crawler
{
    private HTML5 $html5;
    private ?\DOMDocument $document;

    public function __construct()
    {
        $this->html5 = new HTML5();
    }

    public function addHtmlContent(string $html): self
    {
        $this->document = $this->html5->loadHTML($html);

        return $this;
    }

    public function getTagsMap(string $html): array
    {
        $nodeList = $this->document->getElementsByTagName('*');

        $map = [];
        foreach ($nodeList as $el) {
            if (array_key_exists($el->tagName, $map)) {
                $map[$el->tagName] += 1;
            } else {
                $map[$el->tagName] = 1;
            }
        }

        return $map;
    }
}
