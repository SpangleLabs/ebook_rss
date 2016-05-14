<?php

namespace rss;

class Item {
    private $title = "";
    private $description = "";
    private $link = "";
    private $guid = "";
    private $pubDate = "";
    
    function setTitle($title) {
        $this->title = $title;
    }
    
    function setDescription($desc) {
        $this->description = $desc;
    }
    
    function setLink($link) {
        $this->link = $link;
    }
    
    function setGuid($guid) {
        $this->guid = $guid;
    }
    
    function setPubDate($pubDate) {
        $this->pubDate = $pubDate;
    }
    
    static function outputTime($unixTime) {
        return gmdate("D, j M Y H:i:s O", $unixTime);
    }
    
    static function fromFile($file) {
        $newItem = Item();
        $newItem->setTitle($file->getFileName());
        $newItem->setDescription($file->getFullName());
        $fullLink = "http://spangle.org.uk/ebook_rss/".$file->getFullName();
        $newItem->setLink($fullLink);
        $newItem->setGuid($fullLink);
        $newItem->setPubDate(Item::outputTime($file->getModTime()));
        return $newItem;
    }
    
    function toXml() {
        //TODO
        return "";
    }
}
