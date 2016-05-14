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
    
    public static function loadDirectory($dirName) {
        $fileNames = array_diff(scandir($dirName), array('..', '.'));
        $fileArray = Array();
        foreach($fileNames as $fileName) {
            $fullName = $dirName+"/"+$fileName;
            $fileArray[] = $fullName;
        }
        
        // Sort the files
        usort($fileArray, function($a, $b) {
            return filemtime($a)-filemtime($b);
        });
        
        // Create file objects
        $returnDir = new Directory();
        foreach($fileArray as $fullName) {
            $newFile = new File($fullName);
            $returnDir->addFile($newFile);
        }
        return $returnDir;
    }
}
