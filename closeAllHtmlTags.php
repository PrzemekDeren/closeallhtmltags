<?php

use DOMDocument;
use DOMXPath;

class closeAllHtmlTags
{
    // Creates new DOM object with a given content
    // and then returns valid HTML generated by DOM.
    public function index($messyHtml)
    {
        $dom = new DOMDocument();
        // Prevents errors and warnings
        libxml_use_internal_errors(true);
        $dom->loadHTML("<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"></head>{$messyHtml}");
        $xpath = new DOMXPath($dom);
        $node = $dom->getElementsByTagName('body')[0];
        $validHtml = '';
        $validHtml .= $dom->saveHTML($node);
        // Removes '<body>' from the beginning of
        // a string and '</body>' from it's end.
        $validHtml = substr($validHtml, 6, -7);
        return $validHtml;
    }
}

