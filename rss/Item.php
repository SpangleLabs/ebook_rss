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
        $newItem = new Item();
        $newItem->setTitle($file->getFileName());
        $newItem->setDescription($file->getFullName());
        $fullLink = "http://spangle.org.uk/ebook_rss/".$file->getDirName()."/".urlencode($file->getFileName());
        $newItem->setLink($fullLink);
        $newItem->setGuid($fullLink);
        $newItem->setPubDate(Item::outputTime($file->getModTime()));
        return $newItem;
    }
    
    function toXml() {
        $output = "<item>";
        $output .= "<title>".$this->title."</title>";
        $output .= "<description>".$this->description."</description>";
        $output .= "<link>".$this->link."</link>";
        $output .= "<guid>".$this->guid."</guid>";
        $output .= "<pubDate>".$this->pubDate."</pubDate>";
        $output .= "</item>";
        return $output;
    }
}
