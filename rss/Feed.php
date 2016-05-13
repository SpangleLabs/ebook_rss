<?php

namespace rss;

class Feed {
    private $itemList = Array();
    
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
    }
    
    public static function fromDirectory($directory) {
        //TODO;
    }
}
