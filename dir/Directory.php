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
    
    public static function compareModTimes($fileNameA, $fileNameB) {
        $timeA = filemtime($fileNameA);
        $timeB = filemtime($fileNameB);
        return $timeA-$timeB;
    }
    
    public static function loadDirectory($dirName) {
        $fileNames = array_diff(scandir($dirName), array('..', '.'));
        $fileArray = Array();
        foreach($fileNames as $fileName) {
            $fullName = $dirName+"/"+$fileName;
            $fileArray[] = $fullName;
        }
        
        // Sort the files
        usort($fileArray, Array("Directory","compareModTimes"));
        
        // Create file objects
        $returnDir = new Directory();
        foreach($fileArray as $fullName) {
            $newFile = new File($fullName);
            $returnDir->addFile($newFile);
        }
        return $returnDir;
    }
}
