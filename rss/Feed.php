<?php

namespace rss;

class Feed {
    private $itemList = Array();
    private $desc = "";
    private $title = "";
    
    public function addItem($newItem) {
        $this->itemList[] = $newItem;
    }
    
    public function listItems() {
        return $this->itemList;
    }
    
    public function toXml() {
        $output = '<?xml version="1.0" encoding="UTF-8"?>';
        $output .= '<rss version="2.0">';
        $output .= '<channel>';
        $output .= '<description>'.$this->desc.'</description>';
        $output .= '<title>'.$this->title.'</title>';
        $output .= '<generator>ebook_rss</generator>';
        $output .= '<link>http://spangle.org.uk/ebook_rss/</link>';
        foreach($this->listItems() as $item) {
            $output .= $item->toXml();
        }
        $output .= '</channel>';
        $output .= '</rss>';
        return $output;
    }
    
    public static function fromDirectory($directory) {
        $newFeed = new Feed();
        foreach($directory->listFiles() as $file) {
            $newItem = Item::fromFile($file);
            $newFeed->addItem($newItem);
        }
        return $newFeed;
    }
}
