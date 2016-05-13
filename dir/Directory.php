<?php

namespace dir;

class Directory {
    private $listItems = Array();
    
    public function addFile($newFile) {
        $this->listItems[] = $newFile;
    }
    
    public function listFiles() {
        return $this->listItems;
    }
    
    public static function loadDirectory($dir_name) {
        //TODO
    }
}
